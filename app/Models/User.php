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
        'avatar' => 'data:image/png;base64,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'
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
}
