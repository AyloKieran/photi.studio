<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Managers\User\Preference\UserPreferenceManager;

class BaseLayout extends Component
{
    public function __construct()
    {
        $__UserPreferenceManager = new UserPreferenceManager();
    }

    public function render()
    {
        $upm = new \App\Managers\User\Preference\UserPreferenceManager();

        $theme = $upm->getUserPreference("preference.user.theme", auth()->user());

        return view('layouts.base')->with("theme", $theme);
    }
}
