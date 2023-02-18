<?php

namespace App\Managers\Feed;

use App\Models\Post;
use App\Models\User;
use App\Enums\PreferencesEnum;
use App\Enums\PostStatusEnum;
use App\Managers\BaseCachedManager;
use App\Managers\User\Preference\UserPreferenceManager;
use Illuminate\Support\Facades\DB;

class TrendingFeedManager extends BaseCachedManager
{
    protected $__UserPreferenceManager;

    public function __construct()
    {
        parent::__construct();
        $this->__UserPreferenceManager = new UserPreferenceManager();
    }

    private function generateKey()
    {
        return 'trending_feed';
    }

    public function generateTrendingFeed(User $user = null)
    {
        return $this->__CacheManager->getOrSet($this->generateKey(), function () use ($user) {
            $limit = $this->__UserPreferenceManager->getUserPreference(PreferencesEnum::THEME_PAGE_SIZE, $user);

            $query = "
            SELECT COUNT(*) as Likes, Post.*
            FROM `post_user_ratings` as PostRating
            LEFT JOIN posts as Post on Post.id = PostRating.post_id
            WHERE rating = 'like'
            AND PostRating.updated_at between date_sub(now(),INTERVAL " . 1 . " WEEK) and now()
            AND Post.deleted_at IS NULL
            AND Post.status = '" . PostStatusEnum::COMPLETE->value . "'
            GROUP BY PostRating.post_id
            ORDER BY COUNT(*) DESC
            LIMIT 0 , " . $limit . "
            ";

            return Post::modelsFromRawResults(DB::select($query));
        });
    }
}
