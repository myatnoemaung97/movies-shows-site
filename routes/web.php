<?php

use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\AdminContentController;
use App\Http\Controllers\AdminEpisodeController;
use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\AdminPersonController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CelebrityController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminSeasonController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminShowController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\SpotlightController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use App\Models\Movie;
use App\Models\Show;
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

Route::get('/test', function () {
    dd(class_basename(Show::first()));
});

Route::get('/', function () {
    return view('index', [
        'articles' => Article::latest()->where('status', 'published')->take(4)->get()
    ]);
});

Route::get('/articles/{article}', [ArticleController::class, 'show']);

Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies/{movie}', [MovieController::class, 'show']);

Route::get('/shows', [ShowController::class, 'index']);
Route::get('/shows/{show}', [ShowController::class, 'show']);

Route::get('/celebrities/{person}', [CelebrityController::class, 'show']);

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
    Route::resource('/admin/articles', AdminArticleController::class);
    Route::resource('/admin/articles/{article}/contents', AdminContentController::class);
    Route::resource('/admin/movies', AdminMovieController::class);
    Route::resource('/admin/shows', AdminShowController::class);
    Route::resource('/admin/shows/{show}/seasons', AdminSeasonController::class);
    Route::resource('/admin/shows/{show}/seasons/{season}/episodes', AdminEpisodeController::class);
    Route::resource('/admin/people', AdminPersonController::class);

});


