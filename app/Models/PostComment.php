<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostComment extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    protected $with = ['author'];

    protected $fillable = [
        'user_id',
        'post_id',
        'commentText'
    ];

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
