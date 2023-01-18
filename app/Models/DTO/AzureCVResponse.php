<?php

namespace App\Models\DTO;

use App\Models\DTO\Models\Adult;
use App\Models\DTO\Models\Color;
use App\Models\DTO\Models\Description;
use App\Models\DTO\Models\Metadata;
use Illuminate\Database\Eloquent\Model;

class AzureCVResponse extends Model
{
    public Adult $adult;
    public Color $color;
    public array $tags;
    public Description $description;
    public Metadata $metadata;
}
