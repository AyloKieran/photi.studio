<?php

namespace App\Enums;

enum PostStatusEnum: string
{
    case PENDING = 'pending';
    case CONVERTING_UPLOADING = 'converting & uploading';
    case ANALYSING = 'analysing';
    case FINALISING = 'finalising';
    case COMPLETE = 'complete';
    case FAILED = 'failed';
}
