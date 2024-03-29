<?php

namespace App\Managers\User\Post;

use App\Models\User;
use App\Models\Post;
use App\Models\PostUserRating;
use App\Enums\PostRatingEnum;
use App\Enums\PreferencesEnum;
use App\Managers\BaseCachedManager;
use App\Managers\User\Preference\UserPreferenceManager;
use App\Models\TagUserRating;
use App\Notifications\NewLike;

class UserPostRatingManager extends BaseCachedManager
{
    protected $__UserPreferenceManager;

    public function __construct()
    {
        parent::__construct();
        $this->__UserPreferenceManager = new UserPreferenceManager();
    }

    private function generateKey(Post $post, User $user)
    {
        return 'post_rating_' . $post->id . '_' . $user->id;
    }

    public function getRating(Post $post, User $user)
    {
        $rating = $this->__CacheManager->getOrSet($this->generateKey($post, $user), function () use ($post, $user) {

            dd($post->userRating($user));

            return $post->userRating($user)->first();
        });

        return $rating ? $rating->rating : PostRatingEnum::NONE->value;
    }

    private function getRatingDifference(Post $post, PostRatingEnum $rating)
    {
        $postUserRating = $post->userRating->rating ?? PostRatingEnum::NONE->value;
        $rating = $rating->value;

        if ($postUserRating == PostRatingEnum::NONE->value) {
            if ($rating == PostRatingEnum::LIKE->value) {
                return 1;
            }
            if ($rating == PostRatingEnum::DISLIKE->value) {
                return -1;
            }
        }
        if ($postUserRating == PostRatingEnum::LIKE->value) {
            if ($rating == PostRatingEnum::DISLIKE->value) {
                return -2;
            }
            if ($rating == PostRatingEnum::NONE->value) {
                return -1;
            }
        }
        if ($postUserRating == PostRatingEnum::DISLIKE->value) {
            if ($rating == PostRatingEnum::LIKE->value) {
                return 2;
            }
            if ($rating == PostRatingEnum::NONE->value) {
                return 1;
            }
        }
    }

    public function setRating(Post $post, User $user, PostRatingEnum $rating)
    {
        // TO DO: move this to a separate manager, maybe a job too (for performance)
        $post->tags->each(function ($tag) use ($user, $post, $rating) {
            $tagUserRating = TagUserRating::firstOrCreate([
                'tag_id' => $tag->id,
                'user_id' => $user->id,
            ]);

            $tagUserRating->rating = $tagUserRating->rating + $this->getRatingDifference($post, $rating);
            $tagUserRating->save();
        });

        $userRating = PostUserRating::updateOrCreate(
            [
                'post_id' => $post->id,
                'user_id' => $user->id,
            ],
            [
                'rating' => $rating,
            ]
        );

        if ($rating->value == PostRatingEnum::LIKE->value) {
            if ($this->__UserPreferenceManager->getUserPreference(PreferencesEnum::COMMUNICATIONS_NEW_LIKE, $user) == 'true') {
                $post->author->notify(new NewLike($post, $user));
            }
        }

        return $this->__CacheManager->set($this->generateKey($post, $user), $userRating);
    }
}
