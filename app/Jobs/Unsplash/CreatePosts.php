<?php

namespace App\Jobs\Unsplash;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class CreatePosts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        $responses = Http::withHeaders([
            "Authorization" => "Bearer " . env("UNSPLASH_ACCESS_TOKEN")
        ])->get("https://api.unsplash.com/photos/random", [
            "count" => 30,
        ])->json();

        if (isset($responses)) {
            foreach ($responses as $photo) {
                CreatePost::dispatch($photo);
            }
        }
    }
}
