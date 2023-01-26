<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostTag extends Pivot
{
    use Uuids, SoftDeletes;
}
