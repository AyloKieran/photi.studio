<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;

Route::get('/', function () {
    return redirect()->route('home');
});

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
Route::get('/search/tag/{tag}', function ($tag) {
    return view('pages.tag')->with('tag', $tag);;
})->name('search.tag');

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cleared";
});

require __DIR__ . '/auth.php';
