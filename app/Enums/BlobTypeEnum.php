<?php

namespace App\Enums;

enum BlobTypeEnum: string
{
    case AVATAR_IMAGE = 'avatars';
    case POST_IMAGE = 'posts';
}
