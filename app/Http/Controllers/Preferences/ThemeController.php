<?php

namespace App\Http\Controllers\Preferences;

use App\Enums\PreferencesEnum;
use App\Http\Controllers\Controller;
use App\Managers\User\Preference\UserPreferenceManager;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    protected $__UserPreferenceManager;

    function __construct()
    {
        $this->__UserPreferenceManager = new UserPreferenceManager();
    }

    public function show(Request $request)
    {
        return view('pages.preferences.theme')
            ->with('themeKey', PreferencesEnum::THEME->value)
            ->with('theme', $this->__UserPreferenceManager->getUserPreference(PreferencesEnum::THEME, $request->user()))
            ->with('preferredNameKey', PreferencesEnum::THEME_PREFERRED_NAME->value)
            ->with('preferredName', $this->__UserPreferenceManager->getUserPreference(PreferencesEnum::THEME_PREFERRED_NAME, $request->user()));
    }

    public function update(Request $request)
    {
        $toUpdate = $request->validate([
            PreferencesEnum::THEME->value => $this->__UserPreferenceManager->getPreference(PreferencesEnum::THEME)->validation,
            PreferencesEnum::THEME_PREFERRED_NAME->value => $this->__UserPreferenceManager->getPreference(PreferencesEnum::THEME_PREFERRED_NAME)->validation,
        ]);

        foreach ($toUpdate as $key => $value) {
            $this->__UserPreferenceManager->updateUserPreference(PreferencesEnum::from($key), $value, $request->user());
        }

        return redirect()->back();
    }
}
