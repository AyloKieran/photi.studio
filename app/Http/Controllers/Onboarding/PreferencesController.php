<?php

namespace App\Http\Controllers\Onboarding;

use App\Http\Controllers\Controller;

class PreferencesController extends Controller
{
    public function index()
    {
        return view('pages.onboarding.preferences');
    }
}
