<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/install', function () {
    return view('pages.install');
});

Route::group(['prefix' => '/onboarding', 'middleware' => ['auth']], function () {
    Route::get('', fn () => redirect(route('onboarding.profile')))->name('onboarding');
    Route::group(['prefix' => 'profile'], function () {
        Route::get('', [\App\Http\Controllers\Onboarding\ProfileController::class, 'index'])->name('onboarding.profile');
        Route::post('', [\App\Http\Controllers\Onboarding\ProfileController::class, 'store'])->name('onboarding.profile.store');
    });
    Route::group(['prefix' => 'preferences'], function () {
        Route::get('', [\App\Http\Controllers\Onboarding\PreferencesController::class, 'index'])->name('onboarding.preferences');
        Route::post('', [\App\Http\Controllers\Onboarding\PreferencesController::class, 'store'])->name('onboarding.preferences.store');
    });
    Route::group(['prefix' => 'friends'], function () {
        Route::get('', [\App\Http\Controllers\Onboarding\FriendsController::class, 'index'])->name('onboarding.friends');
        Route::post('', [\App\Http\Controllers\Onboarding\FriendsController::class, 'store'])->name('onboarding.friends.store');
    });
});

Route::group(['middleware' => ['requireVerifiedEmail', 'requireOnboarded']], function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'show'])->name('home');
    Route::get('/trending', [\App\Http\Controllers\TrendingController::class, 'show'])->name('trending');
    Route::get('/following', [\App\Http\Controllers\FollowingController::class, 'show'])->name('following');
    Route::get('/friends', [\App\Http\Controllers\FriendsController::class, 'show'])->name('friends');

    Route::group(['prefix' => 'upload', 'middleware' => ['auth']], function () {
        Route::get('', [\App\Http\Controllers\UploadController::class, 'index'])->name('upload');
        Route::post('', [\App\Http\Controllers\UploadController::class, 'store'])->name('upload.store');
    });

    Route::group(['prefix' => '/preferences', 'middleware' => ['password.confirm', 'auth']], function () {
        Route::get('', fn () => redirect(route('preferences.profile')))->name('preferences');
        Route::group(['prefix' => '/profile'], function () {
            Route::get('', [\App\Http\Controllers\Preferences\ProfileController::class, 'show'])->name('preferences.profile');
            Route::post('', [\App\Http\Controllers\Preferences\ProfileController::class, 'update'])->name('preferences.profile.update');
        });
        Route::group(['prefix' => '/linked-profiles'], function () {
            Route::get('', [\App\Http\Controllers\Preferences\LinkedProfilesController::class, 'show'])->name('preferences.linked-profiles');
        });
        Route::group(['prefix' => '/change-password'], function () {
            Route::get('', [\App\Http\Controllers\Preferences\ChangePasswordController::class, 'show'])->name('preferences.change-password');
            Route::post('', [\App\Http\Controllers\Preferences\ChangePasswordController::class, 'update'])->name('preferences.change-password.update');
        });
        Route::group(['prefix' => '/theme'], function () {
            Route::get('', [\App\Http\Controllers\Preferences\ThemeController::class, 'show'])->name('preferences.theme');
            Route::post('', [\App\Http\Controllers\Preferences\ThemeController::class, 'update'])->name('preferences.theme.update');
        });
        Route::group(['prefix' => '/feeds'], function () {
            Route::get('', [\App\Http\Controllers\Preferences\FeedsController::class, 'show'])->name('preferences.feeds');
            Route::post('', [\App\Http\Controllers\Preferences\FeedsController::class, 'update'])->name('preferences.feeds.update');
        });
        Route::group(['prefix' => '/deactivate-profile'], function () {
            Route::get('', [\App\Http\Controllers\Preferences\DeactivateProfileController::class, 'show'])->name('preferences.deactivate-profile');
            Route::post('', [\App\Http\Controllers\Preferences\DeactivateProfileController::class, 'update'])->name('preferences.deactivate-profile.update');
        });
        Route::get('/posts', [\App\Http\Controllers\Preferences\PostsController::class, 'show'])->name('preferences.posts');
        Route::get('/likes', [\App\Http\Controllers\Preferences\LikesController::class, 'show'])->name('preferences.likes');
        Route::get('/tags', [\App\Http\Controllers\Preferences\TagsController::class, 'show'])->name('preferences.tags');
        Route::get('/comments', [\App\Http\Controllers\Preferences\CommentsController::class, 'show'])->name('preferences.comments');
    });
    Route::group(['prefix' => '/search'], function () {
        Route::post('/', [\App\Http\Controllers\SearchController::class, 'lookup'])->name('search.lookup');
        Route::get('/{search?}', [\App\Http\Controllers\SearchController::class, 'show'])->name('search');
        Route::group(['prefix' => '/posts'], function () {
            Route::get('/{search?}', [\App\Http\Controllers\SearchController::class, 'showPosts'])->name('search.posts');
            Route::post('/', [\App\Http\Controllers\SearchController::class, 'lookupPosts'])->name('search.posts.lookup');
        });
        Route::group(['prefix' => '/tags'], function () {
            Route::get('/{search?}', [\App\Http\Controllers\SearchController::class, 'showTags'])->name('search.tags');
            Route::post('/', [\App\Http\Controllers\SearchController::class, 'lookupTags'])->name('search.tags.lookup');
        });
        Route::group(['prefix' => '/users'], function () {
            Route::get('/{search?}', [\App\Http\Controllers\SearchController::class, 'showUsers'])->name('search.users');
            Route::post('/', [\App\Http\Controllers\SearchController::class, 'lookupUsers'])->name('search.users.lookup');
        });
        Route::group(['prefix' => '/tag'], function () {
            Route::get('/{tag}', [\App\Http\Controllers\SearchController::class, 'showTag'])->name('search.tag');
        });
    });
    Route::group(['prefix' => '/post'], function () {
        Route::get('/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('post');
        Route::post('/{post}/like', [\App\Http\Controllers\PostController::class, 'like'])->name('post.like');
        Route::post('/{post}/dislike', [\App\Http\Controllers\PostController::class, 'dislike'])->name('post.dislike');
        Route::post('/{post}/none', [\App\Http\Controllers\PostController::class, 'none'])->name('post.none');
    });
    Route::group(['prefix' => '/profile'], function () {
        Route::get('', [\App\Http\Controllers\ProfileController::class, 'self'])->middleware(['auth'])->name('profile.index');
        Route::get('/{user}', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile');
        Route::post('/{user}/follow', [\App\Http\Controllers\ProfileController::class, 'follow'])->name('profile.follow');
        Route::post('/{user}/unfollow', [\App\Http\Controllers\ProfileController::class, 'unfollow'])->name('profile.unfollow');
    });
});

Route::group(['prefix' => '/unsplash', 'middleware' => ['auth']], function () {
    Route::get('login', [\App\Http\Controllers\Unsplash\UnsplashController::class, 'login'])->name('unsplash.login');
    Route::get('create-post', [\App\Http\Controllers\Unsplash\UnsplashController::class, 'createPost'])->name('unsplash.createPost');
    Route::get('create', [\App\Http\Controllers\Unsplash\UnsplashController::class, 'create'])->name('unsplash.create');
});

Route::get('privacy-policy', function () {
    return view('pages.privacy-policy');
})->name('privacy-policy');

Route::get('/offline', function () {
    return view('pages.offline');
})->name('offline');

Route::get('/update', function () {
    Artisan::call('optimize:clear');
    $DPSM = new \App\Managers\Preferences\Seeders\DefaultPreferenceSeederManager();
    $DPSM->run();
    return "Cleared & Updated";
});

require __DIR__ . '/auth.php';
