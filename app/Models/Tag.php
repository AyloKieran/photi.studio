<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    protected $with = ['posts'];

    protected $fillable = ['name'];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function getFormattedNameAttribute()
    {
        return "#" . $this->name;
    }

    public function getImageAttribute()
    {
        return $this->posts()->first()->image_thumbnail ?? "";
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class)->using(PostTag::class);
    }

    public function getPostCountAttribute()
    {
        return $this->posts()->count();
    }

    public function ratings()
    {
        return $this->hasMany(TagUserRating::class, 'tag_id');
    }
}
