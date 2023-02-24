<?php

namespace App\Http\Livewire;

use App\Enums\PreferencesEnum;
use App\Managers\User\Preference\UserPreferenceManager;
use App\Models\Post;
use App\Models\Scopes\CompleteScope;
use App\Models\Scopes\NsfwScope;
use Livewire\Component;

class PostUploadProgress extends Component
{

    public $posts = [];

    protected $__UserPreferenceManager;

    function __construct()
    {
        parent::__construct();
        $this->__UserPreferenceManager = new UserPreferenceManager();
    }

    public function render()
    {
        $this->posts = Post::withoutGlobalScopes([CompleteScope::class, NsfwScope::class])->where('user_id', auth()->user()->id)
            ->where('updated_at', '>=', now()->subSeconds($this->__UserPreferenceManager->getUserPreference(PreferencesEnum::NOTIFICATION_TIME, auth()->user())))
            ->orderBy('created_at', 'desc')->get();

        return view('livewire.post-upload-progress');
    }
}
