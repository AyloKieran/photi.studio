<?php

namespace App\Jobs\Posts;

use App\Jobs\BasePostJob;
use App\Models\Post;
use App\Models\Tag;
use App\Models\PostTag;
use App\Enums\PostStatusEnum;
use App\Managers\Azure\ComputerVision\AzureComputerVisionManager;

class PostTagMedia extends BasePostJob
{
    protected $tags;
    protected $__AzureComputerVisionManager;

    public function __construct(Post $post, $tags)
    {
        parent::__construct($post);
        $this->tags = $tags;

        $this->__AzureComputerVisionManager = new AzureComputerVisionManager();
    }

    public function handle()
    {
        // TO DO: move this to a separate manager

        $tags = array_map(function ($tag) {
            return $tag['name'];
        }, array_filter(
            $this->tags,
            function ($tag) {
                return $tag['confidence'] > 0.8; // TO DO: make this a constant or user preference
            }
        ));

        $tags = collect($tags)->map(function ($tagString) {
            return Tag::firstOrCreate(['name' => trim($tagString)]);
        });

        foreach ($tags as $tag) {
            PostTag::create([
                'post_id' => $this->post->id,
                'tag_id' => $tag->id
            ]);
        }

        dispatch(new SendNotifications($this->post));

        $this->post->status = PostStatusEnum::COMPLETE->value;
        $this->post->save();
    }
}
