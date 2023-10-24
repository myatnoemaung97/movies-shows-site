<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/test', function () {

});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/login', [SessionsController::class, 'store']);
    Route::get('/logout', [SessionsController::class, 'destroy']);
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [SessionsController::class, 'destroy']);
});

Route::middleware('can:admin')->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    });

    Route::resource('/admin/users', UserController::class);
    Route::resource('/admin/articles', ArticleController::class);
    Route::resource('/admin/articles/{article}/contents', ContentController::class);
    Route::resource('/admin/movies', MovieController::class);
    Route::resource('/admin/shows', ShowController::class);
    Route::resource('/admin/shows/{show}/seasons', SeasonController::class);
    Route::resource('/admin/shows/{show}/seasons/{season}/episodes', EpisodeController::class);
    Route::resource('/admin/people', PersonController::class);
});


