<?php

namespace App\Http\Controllers\Onboarding;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
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
            $avatarFile = request('profile-picture')->store('avatars');
            $fileType = pathinfo($avatarFile, PATHINFO_EXTENSION);
            $fileContents = file_get_contents(storage_path('app/' . $avatarFile));
            $image = 'data:image/' . $fileType . ';base64,' . base64_encode($fileContents);

            $user->avatar = $image;
        }

        if ($request->has('bio') && $request->bio != null) {
            $user->bio = $request->bio;
        }

        $user->onboarding_step = 1;
        $user->save();

        return redirect()->route('onboarding.preferences');
    }
}
