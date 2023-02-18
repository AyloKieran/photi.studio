<?php

namespace App\Managers\Feed;

use App\Models\Post;
use App\Models\User;
use App\Enums\PreferencesEnum;
use App\Enums\PostStatusEnum;
use App\Managers\BaseCachedManager;
use App\Managers\User\Preference\UserPreferenceManager;
use Illuminate\Support\Facades\DB;

class FriendsFeedManager extends BaseCachedManager
{
    protected $__UserPreferenceManager;

    public function __construct()
    {
        parent::__construct();
        $this->__UserPreferenceManager = new UserPreferenceManager();
    }

    private function generateKey(User $user)
    {
        return 'friends_feed_' . $user->id;
    }

    public function generateFriendsFeed(User $user)
    {
        return $this->__CacheManager->getOrSet($this->generateKey($user), function () use ($user) {
            $limit = $this->__UserPreferenceManager->getUserPreference(PreferencesEnum::THEME_PAGE_SIZE, $user);

            $query = "
            SELECT Posts.*
            FROM `posts` AS Posts
            WHERE user_id IN
            (
                SELECT f1.user_id
                FROM `user_followings` AS f1
                JOIN user_followings AS f2 ON f1.user_id = f2.follows_user_id
                AND f1.follows_user_id = f2.user_id
                WHERE f1.user_id <> '" . $user->id . "'
            )
            AND Posts.deleted_at IS NULL
            AND Posts.status = '" . PostStatusEnum::COMPLETE->value . "'
            ORDER BY created_at DESC
            LIMIT 0 , " . $limit . "
            ";

            return Post::modelsFromRawResults(DB::select($query));
        });
    }
}
