<?php

namespace App\Models;

use App\Enums\PostRatingEnum;
use App\Managers\User\Post\UserPostRatingManager;
use App\Managers\Post\Tag\PostTagManager;
use App\Traits\Uuids;
use App\Traits\UsesRawDBQuery;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Scopes\CompleteScope;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, UsesRawDBQuery, Uuids, SoftDeletes, CascadeSoftDeletes;

    protected $__UserPreferenceManager;
    protected $__UserPostRatingManager;
    protected $__PostTagManager;

    protected $cascadeDeletes = ['tags'];
    protected $with = ['author', 'ratings'];

    public function __construct()
    {
        parent::__construct();
        $this->__UserPostRatingManager = new UserPostRatingManager();
        $this->__PostTagManager = new PostTagManager();
    }

    protected static function booted()
    {
        static::addGlobalScope(new CompleteScope);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->using(PostTag::class);
    }

    public function ratings()
    {
        return $this->hasMany(PostUserRating::class, 'post_id');
    }

    public function userRating()
    {
        return $this->hasOne(PostUserRating::class, 'post_id')->where('user_id', Auth::id());
    }

    public function getRatingAttribute()
    {

        $ratings = $this->ratings()->get();
        return $ratings->where('rating', PostRatingEnum::LIKE->value)->count() - $ratings->where('rating', PostRatingEnum::DISLIKE->value)->count();
    }

    public function relatedPostsByTag()
    {
        return $this->__PostTagManager->getRelatedPostsByTag($this);
    }
}
