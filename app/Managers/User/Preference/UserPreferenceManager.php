<?php

namespace App\Managers\User\Preference;

use App\Managers\BaseCachedManager;

class UserPreferenceManager extends BaseCachedManager
{
    public function getUserPreference($key, $user = null)
    {
        if ($key == "preference.user.theme") { // TO DO: proper preference manager here
            if ($user == null) {
                return "dark"; // default state
            }

            return "dark";
        }
    }
}
