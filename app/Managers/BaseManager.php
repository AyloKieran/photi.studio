<?php

namespace App\Managers;

use Illuminate\Support\Facades\Auth;

class BaseManager
{
    protected $user;

    function __construct()
    {
        $this->user = Auth::user();
    }
}
