<?php

namespace App\Jobs\Posts;

use App\Jobs\BasePostJob;
use App\Models\Post;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewPost;

class SendNotifications extends BasePostJob
{

    public function __construct(Post $post)
    {
        parent::__construct($post);
    }

    public function handle()
    {
        Notification::send($this->post->author->followers->pluck('user'), new NewPost($this->post));
    }
}
