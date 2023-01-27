<?php

namespace App\Enums;

enum PostRatingEnum: string
{
    case NONE = 'none';
    case LIKE = 'like';
    case DISLIKE = 'dislike';
}
