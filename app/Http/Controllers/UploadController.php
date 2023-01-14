<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Managers\User\Post\UserPostImageManager;
use App\Models\Post;
use App\Models\Tag;
use App\Models\PostTag;

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
        $post->r = 0;
        $post->g = 0;
        $post->b = 0;

        $cvInfo = $this->__UserPostImageManager->uploadAndAnalyseImage($post, $request->file('image'));

        $post->width = $cvInfo->metadata->width;
        $post->height = $cvInfo->metadata->height;
        $post->nsfw = $cvInfo->adult->isAdultContent || $cvInfo->adult->isRacyContent || $cvInfo->adult->isGoryContent;

        if ($request->has('title') && $request->title != null) {
            $post->title = $request->title;
        }

        if ($request->has('description') && $request->description != null) {
            $post->description = $request->description;
        }

        $post->save();

        // TO DO: move this to a separate manager

        $tags = array_map(function ($tag) {
            return $tag['name'];
        }, array_filter(
            $cvInfo->tags,
            function ($tag) {
                return $tag['confidence'] > 0.8; // TO DO: make this a constant or user preference
            }
        ));

        $tags = collect($tags)->map(function ($tagString) {
            return Tag::firstOrCreate(['name' => trim($tagString)]);
        });

        foreach ($tags as $tag) {
            PostTag::create([
                'post_id' => $post->id,
                'tag_id' => $tag->id
            ]);
        }

        return redirect(route('post', ['post' => $post]));
    }
}
