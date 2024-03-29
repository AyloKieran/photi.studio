<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostUserRating extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    protected $fillable = [
        'post_id',
        'user_id',
        'rating',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
