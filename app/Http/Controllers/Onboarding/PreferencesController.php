<?php

namespace App\Http\Controllers\Onboarding;

use App\Enums\OnboardingStepEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PreferencesController extends Controller
{
    public function index()
    {
        return view('pages.onboarding.preferences');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'profile-picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:1024'],
        //     'bio' => ['max:255'],
        // ]);

        $user = $request->user();
        $user->onboarding_step = OnboardingStepEnum::FREINDS;
        $user->save();

        return redirect()->route('onboarding.friends');
    }
}
