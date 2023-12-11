<?php

namespace App\Http\Controllers\Preferences;

use App\Enums\PreferencesEnum;
use App\Http\Controllers\Controller;
use App\Managers\User\Preference\UserPreferenceManager;
use Illuminate\Http\Request;

class CommunicationsController extends Controller
{
    protected $__UserPreferenceManager;

    function __construct()
    {
        $this->__UserPreferenceManager = new UserPreferenceManager();
    }

    public function show(Request $request)
    {
        return view('pages.preferences.communications')
            ->with('likeKey', PreferencesEnum::COMMUNICATIONS_NEW_LIKE->value)
            ->with('like', $this->__UserPreferenceManager->getUserPreference(PreferencesEnum::COMMUNICATIONS_NEW_LIKE, $request->user()))
            ->with('postKey', PreferencesEnum::COMMUNICATIONS_NEW_POST->value)
            ->with('post', $this->__UserPreferenceManager->getUserPreference(PreferencesEnum::COMMUNICATIONS_NEW_POST, $request->user()))
            ->with('followKey', PreferencesEnum::COMMUNICATIONS_NEW_FOLLOW->value)
            ->with('follow', $this->__UserPreferenceManager->getUserPreference(PreferencesEnum::COMMUNICATIONS_NEW_FOLLOW, $request->user()));
    }

    public function update(Request $request)
    {
        $request[PreferencesEnum::COMMUNICATIONS_NEW_LIKE->value] = $request->has(PreferencesEnum::COMMUNICATIONS_NEW_LIKE->value) ? 'true' : 'false';
        $request[PreferencesEnum::COMMUNICATIONS_NEW_POST->value] = $request->has(PreferencesEnum::COMMUNICATIONS_NEW_POST->value) ? 'true' : 'false';
        $request[PreferencesEnum::COMMUNICATIONS_NEW_FOLLOW->value] = $request->has(PreferencesEnum::COMMUNICATIONS_NEW_FOLLOW->value) ? 'true' : 'false';

        $toUpdate = $request->validate([
            PreferencesEnum::COMMUNICATIONS_NEW_LIKE->value => $this->__UserPreferenceManager->getPreference(PreferencesEnum::COMMUNICATIONS_NEW_LIKE)->validation,
            PreferencesEnum::COMMUNICATIONS_NEW_POST->value => $this->__UserPreferenceManager->getPreference(PreferencesEnum::COMMUNICATIONS_NEW_POST)->validation,
            PreferencesEnum::COMMUNICATIONS_NEW_FOLLOW->value => $this->__UserPreferenceManager->getPreference(PreferencesEnum::COMMUNICATIONS_NEW_FOLLOW)->validation,
        ]);

        foreach ($toUpdate as $key => $value) {
            $this->__UserPreferenceManager->updateUserPreference(PreferencesEnum::from($key), $value, $request->user());
        }

        return redirect()->back();
    }
}
