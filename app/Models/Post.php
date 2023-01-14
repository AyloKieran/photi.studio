<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Uuids;

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
        return $this->tags()->with('posts')->get()->pluck('posts')->flatten()->unique()->where('id', '!=', $this->id)->sortBy('id')->unique('id');
    }
}
