<?php

namespace App\Http\Livewire\Preferences;

use App\Enums\SocialMediaPlatformEnum;
use App\Models\UserLinkedProfiles;
use Livewire\Component;

class LinkedProfiles extends Component
{
    public $showURL = false;
    public $canSubmit = false;
    public $platforms = [];
    public $platform = null;
    public $url = null;
    public $current = null;

    protected $listeners = ['save' => 'save'];

    function mount()
    {
        $this->current = UserLinkedProfiles::where('user_id', auth()->user()->id)->first();
        $this->platform = $this->current->platform ?? null;
        $this->url = $this->current->url ?? null;
    }

    function checked($platform)
    {
        $this->platform = $platform;
        $this->url = "";
    }

    public function generateDropdown()
    {
        $this->platforms = [];

        array_map(function ($platform) {
            $this->platforms[] = (object) [
                'key' => ucfirst($platform->value),
                'value' => $platform->value,
                'checked' => $this->platform == $platform->value,
            ];
        }, SocialMediaPlatformEnum::cases());
    }

    public function save()
    {
        if ($this->canSubmit) {
            $lp = UserLinkedProfiles::updateOrCreate([
                'user_id' => auth()->user()->id,
            ], [
                'platform' => $this->platform,
                'url' => $this->url,
            ]);

            $this->current = $lp;
        }
    }

    public function render()
    {
        $this->generateDropdown();
        $this->showURL = $this->platform != null;
        $this->canSubmit = $this->platform != null && $this->url != null && $this->url != $this->current->url && filter_var($this->url, FILTER_VALIDATE_URL);
        return view('livewire.preferences.linkedprofiles');
    }
}
