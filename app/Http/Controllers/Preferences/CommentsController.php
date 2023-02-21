<?php

namespace App\Http\Controllers\Preferences;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function show(Request $request)
    {
        $comments = $request->user()->comments()->get();

        return view('pages.preferences.comments')->with('comments', $comments);
    }
}
