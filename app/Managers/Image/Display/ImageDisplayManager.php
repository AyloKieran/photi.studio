<?php

namespace App\Managers\Image\Display;

use App\Managers\BaseCachedManager;
use App\Models\Post;

class ImageDisplayManager extends BaseCachedManager
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAuthenticationImages()
    {
        return $this->__CacheManager->getOrSet("authentication-images", function () {
            return Post::where('nsfw', false)->inRandomOrder()->take(75)->get(); // TO DO: make this a constant
        }, 60);
    }
}
