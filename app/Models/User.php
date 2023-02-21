<?php

namespace App\Models;

use App\Enums\PreferencesEnum;
use App\Managers\User\Preference\UserPreferenceManager;
use App\Traits\Uuids;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Uuids, SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['posts', 'preferences', 'postRatings', 'tagRatings', 'comments'];

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
        $__UserPreferenceManager = new UserPreferenceManager();

        if ($__UserPreferenceManager->getUserPreference(PreferencesEnum::THEME_PREFERRED_NAME, auth()->user()) == 'username') {
            return $this->username;
        } else {
            return $this->name;
        }
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function postLikes()
    {
        return $this->posts->sum('rating');
    }

    public function tagRatings()
    {
        return $this->hasMany(TagUserRating::class, 'user_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function preferences()
    {
        return $this->hasMany(UserPreference::class, 'user_id');
    }

    public function postRatings()
    {
        return $this->hasMany(PostUserRating::class, 'user_id');
    }

    public function following()
    {
        return $this->hasMany(UserFollowing::class, 'user_id');
    }

    public function followers()
    {
        return $this->hasMany(UserFollowing::class, 'follows_user_id');
    }

    public function isFollowing(User $user)
    {
        return $this->following->contains('follows_user_id', $user->id);
    }

    public function comments()
    {
        return $this->hasMany(PostComment::class, 'user_id');
    }
}
