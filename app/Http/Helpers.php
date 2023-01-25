<?php

if (!function_exists('arrayFindByFieldValue')) {
    function arrayFindByFieldValue($array, $field, $value)
    {
        $foundCount = 0;
        $foundItem = null;

        foreach ($array as $item) {
            if ($item->$field == $value) {
                $foundCount += 1;
                $foundItem = $item->key;
            }
        }

        if ($foundCount == 0) {
            return __('Select ...');
        }

        if ($foundCount > 1) {
            return __(':count Selected', ['count' => $foundCount]);
        }

        return $foundItem;
    }
}
