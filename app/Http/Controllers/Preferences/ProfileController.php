<?php

namespace App\Http\Controllers\Preferences;

use App\Http\Controllers\Controller;
use App\Managers\User\Profiles\UserProfileAvatarManager;
use App\Managers\Image\ImageFileManager;
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

    public function show(Request $request)
    {
        return view('pages.preferences.profile')
            ->with('user', $request->user());
    }

    public function update(Request $request)
    {
        $toUpdate = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $request->user()->id . ',id',
            'profile-picture' => $this->__UserProfileAvatarManager->avatarValidationRules,
            'bio' => ['max:255'],
        ]);

        $username = str_starts_with($request->username, '@') ? $request->username : '@' . $request->username;

        $user = $request->user();

        $user->name = $toUpdate['name'];
        $user->username = $username;

        if ($request->has('profile-picture')) {
            $this->__UserProfileAvatarManager->updateAvatar($user, new File($this->__ImageFileManager->saveImageToFile(request()->file('profile-picture'))));
        }

        if ($request->has('bio') && $request->bio != null) {
            $user->bio = $request->bio;
        }

        $user->save();


        return redirect()->back();
    }
}
