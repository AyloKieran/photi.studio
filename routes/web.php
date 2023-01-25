<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Tag;

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
    Route::get('', function () {
        return redirect()->route('home');
    });
    Route::get('/home', function () {
        return !auth()->user() ? redirect()->route('trending') : view('pages.home');
    })->name('home');
    Route::get('/trending', function () {
        return view('pages.trending');
    })->name('trending');

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
        Route::group(['prefix' => '/theme'], function () {
            Route::get('', [\App\Http\Controllers\Preferences\ThemeController::class, 'show'])->name('preferences.theme');
            Route::post('', [\App\Http\Controllers\Preferences\ThemeController::class, 'update'])->name('preferences.theme.update');
        });
        Route::group(['prefix' => '/content'], function () {
            Route::get('', [\App\Http\Controllers\Preferences\ContentController::class, 'show'])->name('preferences.content');
            Route::post('', [\App\Http\Controllers\Preferences\ContentController::class, 'update'])->name('preferences.content.update');
        });
        Route::group(['prefix' => '/deactivate-profile'], function () {
            Route::get('', [\App\Http\Controllers\Preferences\DeactivateProfileController::class, 'show'])->name('preferences.deactivate-profile');
            Route::post('', [\App\Http\Controllers\Preferences\DeactivateProfileController::class, 'update'])->name('preferences.deactivate-profile.update');
        });
    });
    Route::group(['prefix' => '/search'], function () {
        Route::post('', fn (Request $request) => redirect()->route('search', ['search' => $request->search]))->name('search.lookup');
        Route::get('/{search?}', fn ($search = null) => view('pages.search')->with('search', $search))->name('search');
        Route::get('/tag/{tag}', fn (Tag $tag) => view('pages.search.tag')->with('tag', $tag))->name('search.tag');
        Route::get('/post/{post}', fn ($post) => view('pages.search.post')->with('post', $post))->name('search.post');
    });
    Route::get('/post/{post}', function (Post $post) {
        return view('pages.post')->with('post', $post);
    })->name('post');
    Route::get('/profile/{user}', function (User $user) {
        return view('pages.profile')->with('user', $user);
    })->name('profile');
});

Route::group(['prefix' => '/unsplash', 'middleware' => ['auth']], function () {
    Route::get('login', [\App\Http\Controllers\Unsplash\UnsplashController::class, 'login'])->name('unsplash.login');
    Route::get('create-post', [\App\Http\Controllers\Unsplash\UnsplashController::class, 'createPost'])->name('unsplash.createPost');
    Route::get('create', [\App\Http\Controllers\Unsplash\UnsplashController::class, 'create'])->name('unsplash.create');
});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cleared";
});

require __DIR__ . '/auth.php';
