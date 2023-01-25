<?php

namespace App\View\Components;

use App\Enums\PreferencesEnum;
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
        $theme = $this->__UserPreferenceManager->getUserPreference(PreferencesEnum::THEME->value, auth()->user());

        return view('layouts.base')->with("theme", $theme);
    }
}
