<?php

namespace App\Jobs\Posts;

use App\Jobs\BasePostJob;
use App\Models\Post;
use App\Enums\PostStatusEnum;
use App\Managers\Azure\ComputerVision\AzureComputerVisionManager;

class PostAnalyseMedia extends BasePostJob
{

    protected $__AzureComputerVisionManager;

    public function __construct(Post $post)
    {
        parent::__construct($post);

        $this->__AzureComputerVisionManager = new AzureComputerVisionManager();
    }

    public function handle()
    {
        $cvInfo = $this->__AzureComputerVisionManager->getComputerVisionData($this->post->image_cv);

        $this->post->width = $cvInfo->metadata->width;
        $this->post->height = $cvInfo->metadata->height;
        $this->post->nsfw = $cvInfo->adult->isAdultContent || $cvInfo->adult->isRacyContent || $cvInfo->adult->isGoryContent;
        $this->post->caption = array_values($cvInfo->description->captions)[0]["text"];

        list($r, $g, $b) = sscanf($cvInfo->color->accentColor, "%02x%02x%02x"); // TO DO: move this to a const
        $this->post->r = $r;
        $this->post->g = $g;
        $this->post->b = $b;

        $this->post->status = PostStatusEnum::FINALISING->value;
        $this->post->save();

        dispatch(new PostTagMedia($this->post, $cvInfo->tags));
    }
}
