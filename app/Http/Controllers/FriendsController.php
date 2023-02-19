<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Managers\User\Preference\UserPreferenceManager;
use App\Models\UserFollowing;
use App\Models\Post;
use App\Enums\PreferencesEnum;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    private $__UserPreferenceManager;

    public function __construct()
    {
        $this->middleware('auth');
        $this->__UserPreferenceManager = new UserPreferenceManager();
    }

    public function show(Request $request)
    {
        $user = $request->user();
        $limit = $this->__UserPreferenceManager->getUserPreference(PreferencesEnum::THEME_PAGE_SIZE, $user);

        $posts = Post::whereIn(
            'user_id',
            UserFollowing::whereIn(
                'user_id',
                $user
                    ->following
                    ->pluck('follows_user_id')
            )->pluck('user_id')
        )
            ->orderBy('created_at', 'DESC')
            ->take($limit)->get();

        return view('pages.friends')
            ->with('posts', $posts);
    }
}
