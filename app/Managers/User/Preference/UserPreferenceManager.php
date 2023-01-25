<?php

namespace App\Managers\User\Preference;

use App\Enums\PreferencesEnum;
use App\Managers\BaseCachedManager;
use App\Models\Preference;
use App\Models\UserPreference;

class UserPreferenceManager extends BaseCachedManager
{
    private function generateKey(PreferencesEnum $key, $user)
    {
        return "user_preference_{$user->id}_{$key->value}";
    }

    public function getUserPreference(PreferencesEnum $key, $user = null)
    {
        $preference = $this->getPreference($key);

        if ($user == null) {
            return $preference->default_value;
        }

        return $this->__CacheManager->getOrSet($this->generateKey($key, $user), function () use ($user, $preference) {
            return UserPreference::firstOrCreate([
                'user_id' => $user->id,
                'preference_id' => $preference->id,
            ], [
                'value' => $preference->default_value,
            ])->value;
        });
    }

    public function updateUserPreference(PreferencesEnum $key, $value, $user)
    {
        $preference = $this->getPreference($key);

        $value = UserPreference::updateOrCreate([
            'user_id' => $user->id,
            'preference_id' => $preference->id,
        ], [
            'value' => $value,
        ])->value;

        return $this->__CacheManager->set($this->generateKey($key, $user), $value);
    }

    public function getPreference(PreferencesEnum $key)
    {
        $key = $key->value;
        return $this->__CacheManager->getOrSet($key, function () use ($key) {
            return Preference::where('name', $key)->first();
        }, 60 * 60 * 24 * 30);
    }
}
