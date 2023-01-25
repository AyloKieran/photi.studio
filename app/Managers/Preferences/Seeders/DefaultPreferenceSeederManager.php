<?php

namespace App\Managers\Preferences\Seeders;

use App\Enums\PreferencesEnum;
use App\Managers\BaseManager;
use App\Models\Preference;

class DefaultPreferenceSeederManager extends BaseManager
{
    public function run()
    {
        // TO DO: move this to JSON

        $preferences = [
            [
                'name' => PreferencesEnum::THEME->value,
                'default_value' => 'dark',
            ],
            [
                'name' => PreferencesEnum::THEME_PAGE_SIZE->value,
                'default_value' => '50',
            ],
            [
                'name' => PreferencesEnum::SEARCH_MINIMUM_MATCHING_TAGS->value,
                'default_value' => '2',
            ],
            [
                'name' => PreferencesEnum::THEME_PREFERRED_NAME->value,
                'default_value' => 'username',
            ],
        ];

        foreach ($preferences as $preference) {
            Preference::firstOrCreate($preference);
        }
    }
}
