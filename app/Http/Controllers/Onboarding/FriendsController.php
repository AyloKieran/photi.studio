<?php

namespace App\Http\Controllers\Onboarding;

use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    public function index()
    {
        return view('pages.onboarding.friends');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'profile-picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:1024'],
        //     'bio' => ['max:255'],
        // ]);

        $user = $request->user();
        $user->onboarding_step = null;
        $user->save();

        return redirect(RouteServiceProvider::HOME);
    }
}
