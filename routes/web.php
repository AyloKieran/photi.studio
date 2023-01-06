<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;

Route::get('/', function () {
    return redirect()->route('home');
});


Route::get('/onboarding', fn () => redirect(route('onboarding.profile')))->name('onboarding');
Route::get('/onboarding/profile', function () {
    return view('pages.onboarding.profile');
})->name('onboarding.profile');
Route::get('/onboarding/preferences', function () {
    return view('pages.onboarding.preferences');
})->name('onboarding.preferences');
Route::get('/onboarding/friends', function () {
    return view('pages.onboarding.friends');
})->name('onboarding.friends');

Route::get('/home', function () {
    return view('pages.home');
})->name('home');

Route::get('/preferences', fn () => redirect(route('preferences.profile-information')))->name('preferences');
Route::group(['prefix' => '/preferences', 'middleware' => ['password.confirm']], function () {
    Route::get('/profile-information', fn () => view('pages.preferences.profile-information'))->name('preferences.profile-information');
});

Route::get('/post/{post?}', function ($post = null) {
    return view('pages.post');
})->name('post');
Route::get('/profile/{user}', function (User $user) {
    return view('pages.profile')->with('user', $user);
})->name('profile');

Route::post('/search', function (Request $request) {
    return redirect()->route('search', ['search' => $request->search]);
})->name('search.lookup'); // TO DO: better route name
Route::get('/search/{search?}', function ($search = null) {
    return view('pages.search')->with('search', $search);
})->name('search');
Route::get('/search/{tag}/tags', function ($tag) {
    return view('pages.search.tag')->with('tag', $tag);;
})->name('search.tag');
Route::get('/search/post/{post}', function ($post) {
    return view('pages.search.post')->with('post', $post);;
})->name('search.post');

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cleared";
});

require __DIR__ . '/auth.php';
