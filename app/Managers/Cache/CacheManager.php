<?php

namespace App\Managers\Cache;

use Illuminate\Support\Facades\Cache;

class CacheManager
{
    protected $defaultCacheLength = 120;

    public function getOrSet($key, $value, $seconds = null)
    {
        $seconds = isset($seconds) ? $seconds : $this->defaultCacheLength;
        return Cache::remember($key, $seconds, $value);
    }

    public function set($key, $value, $seconds = null)
    {
        $seconds = isset($seconds) ? $seconds : $this->defaultCacheLength;
        Cache::put($key, $value, $seconds);
        return $value;
    }

    public function setForever($key, $value)
    {
        return Cache::put($key, $value) ? $value : null;
    }

    public function remove($key)
    {
        return Cache::forget($key);
    }

    public function get($key)
    {
        return Cache::get($key);
    }

    public function exists($key)
    {
        return Cache::has($key);
    }
}
