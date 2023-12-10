<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\Unsplash\CreatePosts;

class SeedUnsplash extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:unsplash';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed posts from unsplash';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        CreatePosts::dispatch();
    }
}
