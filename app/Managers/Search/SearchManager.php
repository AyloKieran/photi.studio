<?php

namespace App\Managers\Search;

use App\Managers\BaseCachedManager;
use App\Models\User;
use App\Models\Post;
use App\Models\Tag;

class SearchManager extends BaseCachedManager
{
    private function generateKey($type, $query, $limit)
    {
        return 'search_' . $type . '_' . $query . '_' . $limit;
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function searchPosts($query = null, $limit = 7)
    {
        return $this->__CacheManager->getOrSet($this->generateKey("posts", $query, $limit), function () use ($query, $limit) {
            if (!isset($query)) {
                return Post::all()->take($limit);
            }

            return Post::where('title', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%')
                ->take($limit)->get();
        });
    }

    public function searchTags($query = null, $limit = 7)
    {
        return $this->__CacheManager->getOrSet($this->generateKey("tags", $query, $limit), function () use ($query, $limit) {
            if (!isset($query)) {
                return Tag::withCount('posts')
                    ->withSum('ratings', 'rating')
                    ->orderBy('ratings_sum_rating', 'DESC')
                    ->take($limit)->get();
            }

            return Tag::withCount('posts')
                ->withSum('ratings', 'rating')
                ->orderBy('ratings_sum_rating', 'DESC')
                ->where('name', 'like', '%' . $query . '%')
                ->take($limit)->get();
        });
    }

    public function searchUsers($query = null, $limit = 7)
    {
        return $this->__CacheManager->getOrSet($this->generateKey("users", $query, $limit), function () use ($query, $limit) {
            if (!isset($query)) {
                return User::all()->take($limit);
            }

            return User::where('name', 'like', '%' . $query . '%')
                ->orWhere('username', 'like', '%' . $query . '%')
                ->take($limit)->get();
        });
    }
}
