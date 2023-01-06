<?php

namespace App\Managers;

class BaseManager
{
    protected $user;

    function __construct()
    {
        $this->user = auth()->user();
    }
}
