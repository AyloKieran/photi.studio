<?php

namespace App\Http\Controllers\Onboarding;

use App\Http\Controllers\Controller;
use App\Enums\OnboardingStepEnum;
use App\Managers\Image\ImageFileManager;
use App\Managers\User\Profiles\UserProfileAvatarManager;
use Illuminate\Http\File;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    protected $__UserProfileAvatarManager;
    protected $__ImageFileManager;

    public function __construct()
    {
        $this->__UserProfileAvatarManager = new UserProfileAvatarManager();
        $this->__ImageFileManager = new ImageFileManager();
    }

    public function index()
    {
        return view('pages.onboarding.profile');
    }

    public function store(Request $request)
    {
        $request->validate([
            'profile-picture' => $this->__UserProfileAvatarManager->avatarValidationRules,
            'bio' => ['max:255'],
        ]);

        $user = $request->user();

        if ($request->has('profile-picture')) {
            $this->__UserProfileAvatarManager->updateAvatar($user, new File($this->__ImageFileManager->saveImageToFile(request()->file('profile-picture'))));
        }

        if ($request->has('bio') && $request->bio != null) {
            $user->bio = $request->bio;
        }

        $user->onboarding_step = OnboardingStepEnum::PREFERENCES;
        $user->save();

        return redirect()->route('onboarding.preferences');
    }
}
