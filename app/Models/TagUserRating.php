<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TagUserRating extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    protected $fillable = [
        'tag_id',
        'user_id',
        'rating',
    ];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
