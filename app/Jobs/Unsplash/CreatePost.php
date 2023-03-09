<?php

namespace App\Jobs\Unsplash;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Managers\User\Profiles\UserProfileAvatarManager;
use App\Models\Post;
use App\Models\User;
use App\Jobs\Posts\PostAnalyseMedia;
use App\Jobs\Posts\PostCreation;
use App\Jobs\Posts\PostUploadMedia;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\File as File2;

class CreatePost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $__UserProfileAvatarManager;
    protected $photo;

    function __construct($photo)
    {
        $this->photo = $photo;
        $this->__UserProfileAvatarManager = new UserProfileAvatarManager();
    }

    public function handle(): void
    {
        $photo = $this->photo;

        if (!Post::where('unsplash_id', $photo['id'])->first() != null) {
            if (isset($photo['urls']['regular'])) {
                try {
                    $user = User::firstOrNew([
                        'username' => "@" . $photo['user']['username'],
                        'email' => "kieran+us" . $photo['user']['username'] . "@kierannoble.dev"
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
                } catch (\Exception $e) {
                    // return $e->getMessage();
                }
            }
        }
    }
}
