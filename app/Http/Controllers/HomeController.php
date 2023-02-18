<?php

namespace App\Http\Controllers;

use App\Managers\Feed\HomeFeedManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $__HomeFeedManager;

    public function __construct()
    {
        $this->__HomeFeedManager = new HomeFeedManager();
    }

    public function show(Request $request)
    {
        if (!$request->user()) {
            return redirect()->route('trending');
        }

        $posts = $this->__HomeFeedManager->generateHomeFeed($request->user());

        return view('pages.home')
            ->with('posts', $posts);
    }
}
