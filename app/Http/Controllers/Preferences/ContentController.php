<?php

namespace App\Http\Controllers\Preferences;

use App\Enums\PreferencesEnum;
use App\Http\Controllers\Controller;
use App\Managers\User\Preference\UserPreferenceManager;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    protected $__UserPreferenceManager;

    function __construct()
    {
        $this->__UserPreferenceManager = new UserPreferenceManager();
    }

    public function show(Request $request)
    {
        return view('pages.preferences.content')
            ->with('pageSizeKey', PreferencesEnum::THEME_PAGE_SIZE->value)
            ->with('pageSize', $this->__UserPreferenceManager->getUserPreference(PreferencesEnum::THEME_PAGE_SIZE, $request->user()))
            ->with('minimumMatchingTagsKey', PreferencesEnum::SEARCH_MINIMUM_MATCHING_TAGS->value)
            ->with('minimumMatchingTags', $this->__UserPreferenceManager->getUserPreference(PreferencesEnum::SEARCH_MINIMUM_MATCHING_TAGS, $request->user()));
    }

    public function update(Request $request)
    {
        $toUpdate = $request->validate([
            PreferencesEnum::THEME_PAGE_SIZE->value => $this->__UserPreferenceManager->getPreference(PreferencesEnum::THEME_PAGE_SIZE)->validation,
            PreferencesEnum::SEARCH_MINIMUM_MATCHING_TAGS->value => $this->__UserPreferenceManager->getPreference(PreferencesEnum::SEARCH_MINIMUM_MATCHING_TAGS)->validation,
        ]);

        foreach ($toUpdate as $key => $value) {
            $this->__UserPreferenceManager->updateUserPreference(PreferencesEnum::from($key), $value, $request->user());
        }

        return redirect()->back();
    }
}
