<?php

namespace App\Http\Controllers\Preferences;

use App\Http\Controllers\Controller;
use App\Models\TagUserRating;

class TagsController extends Controller
{
    public function show()
    {
        $tagsData = TagUserRating::with('tag')->where('user_id', auth()->user()->id)->orderBy('rating', 'desc')->get();

        return view('pages.preferences.tags')->with('tagsData', $tagsData);
    }
}
