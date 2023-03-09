<?php

namespace App\Http\Controllers\Unsplash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Jobs\Unsplash\CreatePosts;

class UnsplashController extends Controller
{
    public function create()
    {
        for ($i = 0; $i < 50; $i++) {
            $this->createPost();
        }
    }

    public function createPost()
    {
        CreatePosts::dispatch();
    }

    public function login(Request $request)
    {
        $photo = Http::post("https://unsplash.com/oauth/token", [
            "client_id" => env("UNSPLASH_CLIENT_ID"),
            "client_secret" => env("UNSPLASH_CLIENT_SECRET"),
            "redirect_uri" => "urn:ietf:wg:oauth:2.0:oob",
            "code" => $request->code,
            "grant_type" => "authorization_code"
        ]);

        return $photo;
    }
}
