<?php

namespace App\Enums;

enum BlobTypeEnum: string
{
    case AVATAR_IMAGE = 'avatars';
    case POST_IMAGE_ORIGINAL = 'posts/original';
    case POST_IMAGE_THUMBNAIL = 'posts/thumbnail';
}
