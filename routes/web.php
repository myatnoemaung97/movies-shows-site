<?php

use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\admin\MovieController;
use App\Http\Controllers\admin\ShowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Movie;
use App\Models\User;
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
    $movie = Movie::find(32);

    dd(\Illuminate\Support\Facades\Storage::exists($movie->poster));
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

    Route::resource('/admin/articles', ArticleController::class);
    Route::resource('/admin/movies', MovieController::class);
    Route::resource('/admin/shows', ShowController::class);
});


