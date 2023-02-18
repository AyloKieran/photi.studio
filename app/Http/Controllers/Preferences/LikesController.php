<?php

namespace App\Http\Controllers\Preferences;

use App\Http\Controllers\Controller;
use App\Models\PostUserRating;

class LikesController extends Controller
{
    public function show()
    {
        $ratings = PostUserRating::where('user_id', auth()->user()->id)->with('post')->orderBy('updated_at', 'desc')->get();

        return view('pages.preferences.likes')->with('ratings', $ratings);
    }
}
