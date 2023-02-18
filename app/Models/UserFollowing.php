<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFollowing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'follows_user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function followingUser()
    {
        return $this->belongsTo(User::class, 'follows_user_id');
    }
}
