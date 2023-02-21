<?php

namespace App\Http\Controllers\Preferences;

use App\Http\Controllers\Controller;

class LinkedProfilesController extends Controller
{
    public function show()
    {
        return view('pages.preferences.linked-profiles');
    }
}
