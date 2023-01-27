<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Enums\PostRatingEnum;
use App\Managers\User\Post\UserPostRatingManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $__UserPostRatingManager;

    public function __construct()
    {
        $this->__UserPostRatingManager = new UserPostRatingManager();
    }

    public function show(Post $post)
    {
        return view('pages.post')
            ->with('post', $post);
    }

    public function like(Request $request, Post $post)
    {
        $this->__UserPostRatingManager->setRating($post, $request->user(), PostRatingEnum::LIKE);
        return redirect()->back();
    }

    public function dislike(Request $request, Post $post)
    {
        $this->__UserPostRatingManager->setRating($post, $request->user(), PostRatingEnum::DISLIKE);
        return redirect()->back();
    }

    public function none(Request $request, Post $post)
    {
        $this->__UserPostRatingManager->setRating($post, $request->user(), PostRatingEnum::NONE);
        return redirect()->back();
    }
}
