<?php

namespace App\Managers\Post\Tag;

use App\Enums\PostStatusEnum;
use App\Models\Post;
use App\Enums\PreferencesEnum;
use App\Managers\BaseManager;
use App\Managers\User\Preference\UserPreferenceManager;
use Illuminate\Support\Facades\DB;

class PostTagManager extends BaseManager
{
    protected $__UserPreferenceManager;

    public function __construct()
    {
        parent::__construct();
        $this->__UserPreferenceManager = new UserPreferenceManager();
    }

    public function getRelatedPostsByTag(Post $post)
    {
        $limit = $this->__UserPreferenceManager->getUserPreference(PreferencesEnum::THEME_PAGE_SIZE, $this->user);
        $minimumRelatedTags = $this->__UserPreferenceManager->getUserPreference(PreferencesEnum::SEARCH_MINIMUM_MATCHING_TAGS, $this->user);

        return Post::modelsFromRawResults(DB::select("
            SELECT COUNT( * ) AS MatchingTagCount, Post.*
            FROM post_tag AS PostTag
            LEFT JOIN posts AS Post ON Post.id = PostTag.post_id
            WHERE PostTag.tag_id
            IN (
                SELECT PostTagB.tag_id
                FROM post_tag AS PostTagB
                WHERE PostTagB.post_id = '" . $post->id . "'
            )
            AND PostTag.post_id <> '" . $post->id . "'
            AND Post.deleted_at IS NULL
            AND Post.status = '" . PostStatusEnum::COMPLETE->value . "'
            GROUP BY PostTag.post_id
            HAVING MatchingTagCount >= " . $minimumRelatedTags . "
            ORDER BY MatchingTagCount DESC, Post.created_at desc
            LIMIT 0 , " . $limit . "
            "));
    }
}
