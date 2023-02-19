<?php

namespace App\Http\Controllers\Preferences;

use App\Http\Controllers\Controller;
use App\Models\PostComment;

class CommentsController extends Controller
{
    public function show()
    {
        $comments = PostComment::with('post')->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();

        return view('pages.preferences.comments')->with('comments', $comments);
    }
}
