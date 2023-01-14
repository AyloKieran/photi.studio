<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Managers\User\Post\UserPostImageManager;
use App\Models\Post;

class UploadController extends Controller
{

    protected $__UserPostImageManager;

    public function __construct()
    {
        $this->__UserPostImageManager = new UserPostImageManager();
    }

    public function index()
    {
        return view('pages.upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:10240'],
            'title' => ['required', 'max:50'],
            'description' => ['max:255'],
        ]);

        $post = new Post();
        $post->user_id = $request->user()->id;

        // TO DO: REMOVE
        $post->width = 100;
        $post->height = 100;
        $post->nsfw = false;
        $post->r = 0;
        $post->g = 0;
        $post->b = 0;

        $this->__UserPostImageManager->managePostImage($post, $request->file('image'));

        if ($request->has('title') && $request->title != null) {
            $post->title = $request->title;
        }

        if ($request->has('description') && $request->description != null) {
            $post->description = $request->description;
        }

        $post->save();

        return redirect(route('post', ['post' => $post]));
    }
}
