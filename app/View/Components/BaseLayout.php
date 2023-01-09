<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Managers\User\Preference\UserPreferenceManager;

class BaseLayout extends Component
{
    protected $__UserPreferenceManager;

    public function __construct()
    {
        $this->__UserPreferenceManager = new UserPreferenceManager();
    }

    public function render()
    {
        $theme = $this->__UserPreferenceManager->getUserPreference("preference.user.theme", auth()->user());

        return view('layouts.base')->with("theme", $theme);
    }
}
