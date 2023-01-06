<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BaseLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $upm = new \App\Managers\User\Preference\UserPreferenceManager();

        $theme = $upm->getUserPreference(auth()->user(), "preference.user.theme");

        return view('layouts.base')->with("theme", $theme);
    }
}
