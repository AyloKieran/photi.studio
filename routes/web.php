<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('pages.welcome');
});

Route::get('/home', function () {
    return view('pages.home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/preferences', fn () => redirect(route('preferences.profile-information')))->name('preferences');
Route::group(['prefix' => '/preferences', 'middleware' => ['password.confirm']], function () {
    Route::get('/profile-information', fn () => view('pages.preferences.profile-information'))->name('preferences.profile-information');
});

Route::get('/post', function () {
    return view('pages.post');
})->middleware(['auth'])->name('post');
Route::get('/search/tag/{tag}', function ($tag) {
    return view('pages.tag')->with('tag', $tag);;
})->middleware(['auth'])->name('search.tag');

Route::post('/search', function (Request $request) {
    return redirect()->route('search', ['search' => $request->search]);
})->middleware(['auth'])->name('search.lookup'); // TO DO: better route name
Route::get('/search/{search?}', function ($search = null) {
    return view('pages.search')->with('search', $search);
})->middleware(['auth'])->name('search');

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cleared";
});

require __DIR__ . '/auth.php';
