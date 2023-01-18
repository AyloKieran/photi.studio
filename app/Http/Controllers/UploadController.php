<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Managers\Image\ImageFileManager;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Jobs\Posts\PostAnalyseMedia;
use App\Jobs\Posts\PostCreation;
use App\Jobs\Posts\PostUploadMedia;
use Illuminate\Support\Facades\Bus;

class UploadController extends Controller
{
    protected $__ImageFileManager;

    public function __construct()
    {
        $this->__ImageFileManager = new ImageFileManager();
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
        $post->local_file_path = $this->__ImageFileManager->saveImageToFile(request()->file('image'));

        if ($request->has('title') && $request->title != null) {
            $post->title = $request->title;
        }

        if ($request->has('description') && $request->description != null) {
            $post->description = $request->description;
        }

        $post->save();

        Bus::chain([
            new PostCreation($post),
            new PostUploadMedia($post),
            new PostAnalyseMedia($post),
        ])->dispatch();

        return redirect(route('home'));
    }
}
