<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Managers\Feed\FriendsFeedManager;
use Illuminate\Http\Request;

class FriendsController extends Controller
{

    private $__FriendsFeedManager;

    public function __construct()
    {
        $this->middleware('auth');
        $this->__FriendsFeedManager = new FriendsFeedManager();
    }

    public function show(Request $request)
    {
        $posts = $this->__FriendsFeedManager->generateFriendsFeed($request->user());

        return view('pages.friends')
            ->with('posts', $posts);
    }
}
