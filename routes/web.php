<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cleared";
});

require __DIR__ . '/auth.php';
