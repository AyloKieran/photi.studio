<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PostTag extends Pivot
{
    use Uuids;
}
