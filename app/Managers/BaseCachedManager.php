<?php

namespace App\Managers;

use App\Managers\Cache\CacheManager;

class BaseCachedManager extends BaseManager
{
    protected $__CacheManager;

    function __construct()
    {
        parent::__construct();
        $this->__CacheManager = new CacheManager();
    }
}
