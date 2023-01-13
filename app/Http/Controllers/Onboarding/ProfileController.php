<?php

namespace App\Http\Controllers\Onboarding;

use App\Http\Controllers\Controller;
use App\Enums\OnboardingStepEnum;
use App\Managers\User\Preference\Profiles\UserProfileAvatarManager;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    protected $__UserProfileAvatarManager;

    public function __construct()
    {
        $this->__UserProfileAvatarManager = new UserProfileAvatarManager();
    }

    public function index()
    {
        return view('pages.onboarding.profile');
    }

    public function store(Request $request)
    {
        $request->validate([
            'profile-picture' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:1024'],
            'bio' => ['max:255'],
        ]);

        $user = $request->user();

        if ($request->has('profile-picture')) {

            // $avatarFile = request('profile-picture')->store('avatars');
            // $fileType = pathinfo($avatarFile, PATHINFO_EXTENSION);
            // $fileContents = file_get_contents(storage_path('app/' . $avatarFile));
            // $image = 'data:image/' . $fileType . ';base64,' . base64_encode($fileContents);


            $user->avatar = $this->__UserProfileAvatarManager->updateAvatar($request->file('profile-picture'));
        }

        if ($request->has('bio') && $request->bio != null) {
            $user->bio = $request->bio;
        }

        $user->onboarding_step = OnboardingStepEnum::PREFERENCES;
        $user->save();

        return redirect()->route('onboarding.preferences');
    }
}
