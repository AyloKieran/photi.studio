<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Uuids;

    function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
