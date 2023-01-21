<?php

namespace App\Http\Controllers\Unsplash;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Jobs\Posts\PostAnalyseMedia;
use App\Jobs\Posts\PostCreation;
use App\Jobs\Posts\PostUploadMedia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class UnsplashController extends Controller
{
    public function create()
    {
        for ($i = 0; $i < 50; $i++) {
            $this->createPost();
        }
    }

    public function createPost()
    {
        $reponse = Http::withHeaders([
            "Authorization" => "Bearer " . env("UNSPLASH_ACCESS_TOKEN")
        ])->get("https://api.unsplash.com/photos/random")->json();

        if (!isset($reponse['urls']['regular'])) {
            return "Error";
        }

        $username = "@us-" . $reponse['user']['username'];
        $user = User::firstOrNew(['username' => $username]);
        $user->name = $reponse['user']['name'];
        $user->email = $reponse['user']['username'] . "@unsplash.com";
        $user->password = bcrypt("password");
        $user->save();

        $fileName = storage_path('app/' . uniqid() . '.jpg');
        File::put($fileName, Http::get($reponse['urls']['regular'])->body());

        $post = new Post();
        $post->user_id = $user->id;
        $post->title = "TEST POST";
        $post->local_file_path = $fileName;

        $post->save();

        Bus::chain([
            new PostCreation($post),
            new PostUploadMedia($post),
            new PostAnalyseMedia($post),
        ])->dispatch();

        return redirect()->route('post', $post);
    }

    public function login(Request $request)
    {
        $reponse = Http::post("https://unsplash.com/oauth/token", [
            "client_id" => env("UNSPLASH_CLIENT_ID"),
            "client_secret" => env("UNSPLASH_CLIENT_SECRET"),
            "redirect_uri" => "urn:ietf:wg:oauth:2.0:oob",
            "code" => $request->code,
            "grant_type" => "authorization_code"
        ]);

        return $reponse;
    }
}
