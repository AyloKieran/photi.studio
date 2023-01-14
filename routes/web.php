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
        Route::get('', fn () => redirect(route('preferences.profile-information')))->name('preferences');
        Route::get('/profile-information', fn () => view('pages.preferences.profile-information'))->name('preferences.profile-information');
        Route::get('/theme', fn () => view('pages.preferences.theme'))->name('preferences.theme');
    });
    Route::group(['prefix' => '/search'], function () {
        Route::post('', fn (Request $request) => redirect()->route('search', ['search' => $request->search]))->name('search.lookup');
        Route::get('/{search?}', fn ($search = null) => view('pages.search')->with('search', $search))->name('search');
        Route::get('/{tag}/tags', fn (Tag $tag) => view('pages.search.tag')->with('tag', $tag))->name('search.tag');
        Route::get('/post/{post}', fn ($post) => view('pages.search.post')->with('post', $post))->name('search.post');
    });
    Route::get('/post/{post}', function (Post $post) {
        return view('pages.post')->with('post', $post);
    })->name('post');
    Route::get('/profile/{user}', function (User $user) {
        return view('pages.profile')->with('user', $user);
    })->name('profile');
});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cleared";
});

require __DIR__ . '/auth.php';
