<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Managers\Feed\TrendingFeedManager;

class TrendingController extends Controller
{
    protected $__TrendingFeedManager;

    public function __construct()
    {
        $this->__TrendingFeedManager = new TrendingFeedManager();
    }

    public function show()
    {
        $posts = $this->__TrendingFeedManager->generateTrendingFeed();

        return view('pages.trending')
            ->with('posts', $posts);
    }
}
