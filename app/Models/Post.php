<?php

namespace App\Models;

use App\Enums\PostStatusEnum;
use App\Traits\Uuids;
use App\Traits\UsesRawDBQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, UsesRawDBQuery, Uuids;

    protected $with = ['author'];

    public function newQuery($onlyComplete = true)
    {
        return parent::newQuery($onlyComplete)->where('status', PostStatusEnum::COMPLETE->value);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->using(PostTag::class);
    }

    public function relatedPostsByTag()
    {
        $limit = 50; // TO DO: User preference manager
        $minimumRelatedTags = 2; // TO DO: User preference manager

        return static::modelsFromRawResults(\DB::select("
        SELECT COUNT( * ) AS MatchingTagCount, Post.*
        FROM post_tag AS PostTag
        LEFT JOIN posts AS Post ON Post.id = PostTag.post_id
        WHERE PostTag.tag_id
        IN (
            SELECT PostTagB.tag_id
            FROM post_tag AS PostTagB
            WHERE PostTagB.post_id = '" . $this->id . "'
        )
        AND PostTag.post_id <> '" . $this->id . "'
        GROUP BY PostTag.post_id
        HAVING MatchingTagCount >= " . $minimumRelatedTags . "
        ORDER BY MatchingTagCount DESC, Post.created_at desc
        LIMIT 0 , " . $limit . "
        "));
    }
}
