<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('pages.welcome');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/preferences', fn () => redirect(route('preferences.profile-information')))->name('preferences');
Route::group(['prefix' => '/preferences', 'middleware' => ['password.confirm']], function () {
    Route::get('/profile-information', fn () => view('pages.preferences.profile-information'))->name('preferences.profile-information');
});

Route::get('/post', function () {
    return view('pages.post');
})->middleware(['auth'])->name('post');

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
