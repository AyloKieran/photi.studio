<?php

namespace App\Http\Controllers\Onboarding;

use App\Enums\BlobTypeEnum;
use App\Enums\OnboardingStepEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Managers\Azure\Blobs\AzureBlobManager;

class ProfileController extends Controller
{

    protected $__AzureBlobManager;

    public function __construct()
    {
        $this->__AzureBlobManager = new AzureBlobManager();
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
            $avatarURL = $this->__AzureBlobManager->createBlob(request()->file('profile-picture'), BlobTypeEnum::POST_IMAGE);

            // $avatarFile = request('profile-picture')->store('avatars');
            // $fileType = pathinfo($avatarFile, PATHINFO_EXTENSION);
            // $fileContents = file_get_contents(storage_path('app/' . $avatarFile));
            // $image = 'data:image/' . $fileType . ';base64,' . base64_encode($fileContents);

            $user->avatar = $avatarURL;
        }

        if ($request->has('bio') && $request->bio != null) {
            $user->bio = $request->bio;
        }

        $user->onboarding_step = OnboardingStepEnum::PREFERENCES;
        $user->save();

        return redirect()->route('onboarding.preferences');
    }
}
