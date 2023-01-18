<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Uuids;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = [
        'bio' => 'User has not set a bio yet.',
        'avatar' => 'https://blobs.photi.studio/production/default_avatar.webp'
    ];

    public function getPreferredNameAttribute()
    {
        $username = true;

        if ($username) {
            return $this->username;
        } else {
            return $this->name;
        }
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }
}
