<?php

namespace App\Managers\User\Preference;

use App\Managers\BaseCachedManager;
use App\Models\User;

class UserPreferenceManager extends BaseCachedManager
{
    public function getUserPreference(User $user, $key)
    {
        if ($key == "preference.user.theme") { // TO DO: proper preference manager here
            return "dark";
        }
    }
}
