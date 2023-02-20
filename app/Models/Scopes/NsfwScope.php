<?php

namespace App\Models\Scopes;

use App\Enums\PreferencesEnum;
use App\Managers\User\Preference\UserPreferenceManager;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class NsfwScope implements Scope
{
    protected $__UserPreferenceManager;

    function __construct()
    {
        $this->__UserPreferenceManager = new UserPreferenceManager();
    }

    public function apply(Builder $builder, Model $model)
    {
        $includeNsfw = $this->__UserPreferenceManager->getUserPreference(PreferencesEnum::FEEDS_SHOW_NSFW, auth()->user()) == 'true';

        if ($includeNsfw) {
            return;
        }

        $builder->where('nsfw', $includeNsfw);
    }
}
