<?php

namespace App\Managers\Feed;

use App\Enums\PostStatusEnum;
use App\Enums\PostRatingEnum;
use App\Models\Post;
use App\Models\User;
use App\Enums\PreferencesEnum;
use App\Managers\BaseManager;
use App\Managers\User\Preference\UserPreferenceManager;
use Illuminate\Support\Facades\DB;

class HomeFeedManager extends BaseManager
{
    protected $__UserPreferenceManager;

    public function __construct()
    {
        parent::__construct();
        $this->__UserPreferenceManager = new UserPreferenceManager();
    }

    public function generateHomeFeed(User $user)
    {
        $limit = $this->__UserPreferenceManager->getUserPreference(PreferencesEnum::THEME_PAGE_SIZE, $user);
        $minimumRelatedTags = $this->__UserPreferenceManager->getUserPreference(PreferencesEnum::SEARCH_MINIMUM_MATCHING_TAGS, $user);
        $includeInteracted = $this->__UserPreferenceManager->getUserPreference(PreferencesEnum::FEEDS_SHOW_INTERACTED, $user) == 'true';

        $query = "
        SELECT COUNT( * ) AS MatchingTagCount, Post.*
        FROM post_tag AS PostTag
        LEFT JOIN posts AS Post ON Post.id = PostTag.post_id
        WHERE PostTag.tag_id
        IN (
            SELECT PostTagB.tag_id
            FROM tag_user_ratings AS PostTagB
            WHERE user_id = '" . $user->id . "'
            AND rating > (
                SELECT AVG(rating) from tag_user_ratings
                WHERE user_id = '" . $user->id . "'
            )
        )";

        if (!$includeInteracted) {
            $query = $query . "
            AND Post.id NOT IN (
                SELECT PostTagC.post_id
                FROM post_user_ratings AS PostTagC
                WHERE user_id = '" . $user->id . "'
                AND rating != '" . PostRatingEnum::NONE->value . "'
            )";
        }

        $query = $query . "
        AND Post.deleted_at IS NULL
        AND Post.status = '" . PostStatusEnum::COMPLETE->value . "'
        GROUP BY PostTag.post_id
        HAVING MatchingTagCount >= " . $minimumRelatedTags . "
        ORDER BY MatchingTagCount desc, Post.created_at desc
        LIMIT 0 , " . $limit . "
        ";

        return Post::modelsFromRawResults(DB::select($query));
    }
}
