<?php

namespace App\Managers\User\Preference;

use App\Managers\BaseCachedManager;
use App\Models\Preference;
use App\Models\UserPreference;

class UserPreferenceManager extends BaseCachedManager
{
    private function generateKey($key, $user)
    {
        return "user_preference_{$user->id}_{$key}";
    }

    public function getUserPreference($key, $user = null)
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

    public function updateUserPreference($key, $user, $value)
    {
        $preference = $this->getPreference($key);

        return $this->__CacheManager->getOrSet($this->generateKey($key, $user), function () use ($user, $preference, $value) {
            return UserPreference::updateOrCreate([
                'user_id' => $user->id,
                'preference_id' => $preference->id,
            ], [
                'value' => $value,
            ])->value;
        });
    }

    private function getPreference($key)
    {
        return $this->__CacheManager->getOrSet($key, function () use ($key) {
            return Preference::where('name', $key)->first();
        }, 60 * 60 * 24 * 30);
    }
}
