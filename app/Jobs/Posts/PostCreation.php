<?php

namespace App\Jobs\Posts;

use App\Enums\PostStatusEnum;
use App\Jobs\BasePostJob;
use App\Models\Post;

class PostCreation extends BasePostJob
{
    public function __construct(Post $post)
    {
        parent::__construct($post);
    }

    public function handle()
    {
        $this->post->status = PostStatusEnum::CONVERTING_UPLOADING;
        $this->post->save();
    }
}
