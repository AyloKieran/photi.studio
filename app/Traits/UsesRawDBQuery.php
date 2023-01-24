<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;

trait UsesRawDBQuery
{
    public static function modelsFromRawResults($rawResult = [])
    {
        $objects = [];

        foreach ($rawResult as $result) {
            $object = new static();

            $object->setRawAttributes((array)$result, true);

            $objects[] = $object;
        }

        return new Collection($objects);
    }
}
