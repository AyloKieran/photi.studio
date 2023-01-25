<?php

namespace App\Http\Controllers\Preferences;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeactivateProfileController extends Controller
{
    public function show()
    {
        return view('pages.preferences.deactivate-profile');
    }

    public function update(Request $request)
    {
        $request->user()->delete();
        return redirect()->route('home');
    }
}
