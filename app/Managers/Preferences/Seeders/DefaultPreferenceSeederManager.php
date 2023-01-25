<?php

namespace App\Managers\Preferences\Seeders;

use App\Enums\PreferencesEnum;
use App\Managers\BaseManager;
use App\Models\Preference;
use Illuminate\Support\Facades\Artisan;

class DefaultPreferenceSeederManager extends BaseManager
{
    public function run()
    {
        // TO DO: move this to JSON

        $preferences = [
            [
                'name' => PreferencesEnum::THEME->value,
                'default_value' => 'dark',
                'validation' => 'required|in:dark,light',
            ],
            [
                'name' => PreferencesEnum::THEME_PAGE_SIZE->value,
                'default_value' => '50',
                'validation' => 'required|integer|min:1|max:100',
            ],
            [
                'name' => PreferencesEnum::SEARCH_MINIMUM_MATCHING_TAGS->value,
                'default_value' => '3',
                'validation' => 'required|integer|min:1|max:10',
            ],
            [
                'name' => PreferencesEnum::THEME_PREFERRED_NAME->value,
                'default_value' => 'username',
                'validation' => 'required|in:username,name',
            ],
        ];

        foreach ($preferences as $preference) {
            Preference::updateOrCreate([
                'name' => $preference['name'],
            ], [
                'default_value' => $preference['default_value'],
                'validation' => $preference['validation'],
            ]);
        }

        Artisan::call('cache:clear');
    }
}
