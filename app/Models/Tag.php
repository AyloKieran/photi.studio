<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    protected $fillable = ['name'];

    public function getFormattedNameAttribute()
    {
        return "#" . $this->name;
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function getImage()
    {
        return $this->posts()->first()->image_thumbnail ?? "";
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class)->using(PostTag::class);
    }

    public function getPostsWithTag()
    {
        return $this->posts()->whereHas('tags', function ($query) {
            $query->where('name', $this->name);
        });
    }
}
