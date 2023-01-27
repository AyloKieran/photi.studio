<?php

namespace App\Managers\User\Post;

use App\Models\User;
use App\Models\Post;
use App\Models\PostUserRating;
use App\Enums\PostRatingEnum;
use App\Managers\BaseCachedManager;

class UserPostRatingManager extends BaseCachedManager
{
    public function __construct()
    {
        parent::__construct();
    }

    private function generateKey(Post $post, User $user)
    {
        return 'post_rating_' . $post->id . '_' . $user->id;
    }

    public function getRating(Post $post, User $user)
    {
        $rating = $this->__CacheManager->getOrSet($this->generateKey($post, $user), function () use ($post, $user) {
            return PostUserRating::where('post_id', $post->id)->where('user_id', $user->id)->first();
        });

        return $rating ? $rating->rating : PostRatingEnum::NONE->value;
    }

    public function setRating(Post $post, User $user, PostRatingEnum $rating)
    {
        $rating = PostUserRating::updateOrCreate(
            [
                'post_id' => $post->id,
                'user_id' => $user->id,
            ],
            [
                'rating' => $rating,
            ]
        );

        return $this->__CacheManager->set($this->generateKey($post, $user), $rating);
    }
}
