<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;

Route::get('', function () {
    return redirect()->route('home');
});
Route::get('/home', function () {
    return !auth()->user() ? redirect()->route('trending') : view('pages.home');
})->name('home');

Route::get('/trending', function () {
    return view('pages.trending');
})->name('trending');

Route::get('/upload', function () {
    return view('pages.upload');
})->middleware('auth')->name('upload');

Route::group(['prefix' => '/onboarding', 'middleware' => ['auth']], function () {
    Route::get('', fn () => redirect(route('onboarding.profile')))->name('onboarding');
    Route::get('/profile', fn () => view('pages.onboarding.profile'))->name('onboarding.profile');
    Route::get('/preferences', fn () => view('pages.onboarding.preferences'))->name('onboarding.preferences');
    Route::get('/friends', fn () => view('pages.onboarding.friends'))->name('onboarding.friends');
});

Route::group(['prefix' => '/preferences', 'middleware' => ['password.confirm', 'auth']], function () {
    Route::get('', fn () => redirect(route('preferences.profile-information')))->name('preferences');
    Route::get('/profile-information', fn () => view('pages.preferences.profile-information'))->name('preferences.profile-information');
    Route::get('/theme', fn () => view('pages.preferences.theme'))->name('preferences.theme');
});

Route::group(['prefix' => '/search'], function () {
    Route::post('', fn (Request $request) => redirect()->route('search', ['search' => $request->search]))->name('search.lookup');
    Route::get('/{search?}', fn ($search = null) => view('pages.search')->with('search', $search))->name('search');
    Route::get('/{tag}/tags', fn ($tag) => view('pages.search.tag')->with('tag', $tag))->name('search.tag');
    Route::get('/post/{post}', fn ($post) => view('pages.search.post')->with('post', $post))->name('search.post');
});

Route::get('/post/{post?}', function ($post = null) {
    return view('pages.post');
})->name('post');

Route::get('/profile/{user}', function (User $user) {
    return view('pages.profile')->with('user', $user);
})->name('profile');

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cleared";
});

require __DIR__ . '/auth.php';
