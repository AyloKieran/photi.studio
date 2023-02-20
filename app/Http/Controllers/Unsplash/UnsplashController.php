<?php

namespace App\Http\Controllers\Unsplash;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Jobs\Posts\PostAnalyseMedia;
use App\Jobs\Posts\PostCreation;
use App\Jobs\Posts\PostUploadMedia;
use App\Managers\User\Profiles\UserProfileAvatarManager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\File as File2;

class UnsplashController extends Controller
{
    protected $__UserProfileAvatarManager;

    function __construct()
    {
        $this->__UserProfileAvatarManager = new UserProfileAvatarManager();
    }

    public function create()
    {
        $count = 0;
        for ($i = 0; $i < 5; $i++) {
            $count += $this->createPost();
        }

        return $count;
    }

    public function createPost()
    {
        $count = 0;
        $responses = Http::withHeaders([
            "Authorization" => "Bearer " . env("UNSPLASH_ACCESS_TOKEN")
        ])->get("https://api.unsplash.com/photos/random", [
            "count" => 30,
        ])->json();

        foreach ($responses as $photo) {
            if (!Post::where('unsplash_id', $photo['id'])->first() != null) {

                if (!isset($photo['urls']['regular'])) {
                    return "Error";
                }

                $username = "@" . $photo['user']['username'];
                $user = User::firstOrNew([
                    'username' => $username,
                    'email' => $username . "@unsplash.com"
                ]);
                $user->name = $photo['user']['name'];
                $user->password = bcrypt("password" . $photo['user']['username'] . $photo['id']);

                if (isset($photo['user']['bio'])) {
                    $user->bio = $photo['user']['bio'];
                }

                $fileName = storage_path('app/' . uniqid() . '.jpg');
                File::put($fileName, Http::get($photo['urls']['regular'])->body());

                $avatarFileName = storage_path('app/' . uniqid() . '.jpg');
                File::put($avatarFileName, Http::get($photo['user']['profile_image']['large'])->body());

                $this->__UserProfileAvatarManager->updateAvatar($user, new File2($avatarFileName));

                $user->save();

                $post = new Post();
                $post->user_id = $user->id;
                $post->title = $photo['alt_description'] ?? "Untitled";
                $post->description = $photo['description'];
                $post->local_file_path = $fileName;
                $post->unsplash_id = $photo['id'];

                $post->save();

                Bus::chain([
                    new PostCreation($post),
                    new PostUploadMedia($post),
                    new PostAnalyseMedia($post),
                ])->dispatch();

                $count++;
            }
        }

        return $count;
    }

    public function login(Request $request)
    {
        $photo = Http::post("https://unsplash.com/oauth/token", [
            "client_id" => env("UNSPLASH_CLIENT_ID"),
            "client_secret" => env("UNSPLASH_CLIENT_SECRET"),
            "redirect_uri" => "urn:ietf:wg:oauth:2.0:oob",
            "code" => $request->code,
            "grant_type" => "authorization_code"
        ]);

        return $photo;
    }
}
