<?php

namespace App\Http\Livewire\Onboarding;

use Livewire\Component;
use App\Models\User;
use App\Models\UserFollowing;
use App\Enums\OnboardingStepEnum;

class Friends extends Component
{
    public $search = "";
    public $users = [];
    public $selectedUsers = [];

    protected $listeners = ['save' => 'save'];

    function removeUser($user)
    {
        $this->selectedUsers = array_filter($this->selectedUsers, function ($u) use ($user) {
            return $u !== $user;
        });
    }

    function addUser($user)
    {
        array_push($this->selectedUsers, $user);
    }

    function save()
    {
        foreach ($this->selectedUsers as $user) {
            UserFollowing::firstOrCreate([
                'user_id' => auth()->user()->id,
                'follows_user_id' => $user
            ]);
        }

        $user = auth()->user();
        $user->onboarding_step = OnboardingStepEnum::FINISHED;
        $user->save();

        return redirect()->route('home');
    }

    public function render()
    {
        $this->users = User::where(function ($query) {
            $query->where('id', '!=', auth()->user()->id);
        })->where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('username', 'like', '%' . $this->search . '%');
        })->withCount('followers')
            ->orderBy('followers_count', 'DESC')
            ->take(5)->get();

        return view('livewire.onboarding.friends');
    }
}
