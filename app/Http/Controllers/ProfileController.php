<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserFollowing;
use Illuminate\Http\Request;
use App\Notifications\NewFollower;
use App\Enums\PreferencesEnum;
use App\Managers\User\Preference\UserPreferenceManager;

class ProfileController extends Controller
{
    protected $__UserPreferenceManager;

    public function __construct()
    {
        $this->__UserPreferenceManager = new UserPreferenceManager();
    }

    public function follow(User $user)
    {
        UserFollowing::firstOrCreate([
            'user_id' => auth()->user()->id,
            'follows_user_id' => $user->id,
        ]);

        if ($this->__UserPreferenceManager->getUserPreference(PreferencesEnum::COMMUNICATIONS_NEW_FOLLOW, $user) == 'true') {
            $user->notify(new NewFollower(auth()->user()));
        }

        return redirect()->back();
    }

    public function unfollow(User $user)
    {
        UserFollowing::where([
            'user_id' => auth()->user()->id,
            'follows_user_id' => $user->id,
        ])->delete();

        return redirect()->back();
    }

    public function show(User $user)
    {
        return view('pages.profile')
            ->with('user', $user);
    }

    public function self(Request $request)
    {
        return redirect()->route('profile', $request->user());
    }
}
