<?php

namespace App\Http\Controllers\Preferences;

use App\Http\Controllers\Controller;
use App\Models\TagUserRating;

class PostsController extends Controller
{
    public function show()
    {
        $posts = auth()->user()->posts()->with('ratings')->orderBy('created_at', 'desc')->get();

        return view('pages.preferences.posts')->with('posts', $posts);
    }
}
