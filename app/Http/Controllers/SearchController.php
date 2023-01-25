<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\Search\SearchManager;

class SearchController extends Controller
{
    private $__SearchManager;

    public function __construct()
    {
        $this->__SearchManager = new SearchManager();
    }

    private function GenerateLookup(Request $request, $route)
    {
        $search = trim($request->input('search'), "#");

        return redirect()->route($route, ['search' => $search]);
    }

    public function lookup(Request $request)
    {
        return $this->GenerateLookup($request, 'search');
    }

    public function lookupPosts(Request $request)
    {
        return $this->GenerateLookup($request, 'search.posts');
    }

    public function lookupTags(Request $request)
    {
        return $this->GenerateLookup($request, 'search.tags');
    }

    public function lookupUsers(Request $request)
    {
        return $this->GenerateLookup($request, 'search.users');
    }

    public function show($search = null)
    {
        return view('pages.search')
            ->with('posts', $this->__SearchManager->searchPosts($search))
            ->with('tags', $this->__SearchManager->searchTags($search))
            ->with('users', $this->__SearchManager->searchUsers($search))
            ->with('search', $search);
    }

    public function showPosts($search = null)
    {
        return view('pages.search.posts')
            ->with('posts', $this->__SearchManager->searchPosts($search, 21))
            ->with('search', $search);
    }

    public function showTags($search = null)
    {
        return view('pages.search.tags')
            ->with('tags', $this->__SearchManager->searchTags($search, 21))
            ->with('search', $search);
    }

    public function showUsers($search = null)
    {
        return view('pages.search.users')
            ->with('users', $this->__SearchManager->searchUsers($search, 21))
            ->with('search', $search);
    }
}
