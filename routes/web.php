<?php

use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\AdminContentController;
use App\Http\Controllers\AdminEpisodeController;
use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\AdminPersonController;
use App\Http\Controllers\AdminPlaylistController;
use App\Http\Controllers\AdminSeasonController;
use App\Http\Controllers\AdminShowController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CelebrityController;
use App\Http\Controllers\DislikeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WatchListController;
use App\Models\Article;
use App\Models\Movie;
use App\Models\Playlist;
use App\Models\Show;
use Illuminate\Http\Request;
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
    dd(uuid_create());
});

Route::post('/testPost', [TestController::class, 'store']);
Route::delete('/testDelete', [TestController::class, 'destroy']);
Route::patch('/testPatch', [TestController::class, 'destroy']);

Route::patch('/test', function (Request $request) {
    dd($request->all());
});

Route::get('/', function () {
    return view('index', [
        'articles' => Article::latest()->where('status', 'published')->take(4)->get(),
        'playlists' => Playlist::latest()->where('pinned', true)->get(),
        'movies' => Movie::latest()->take(4)->get(),
        'shows' => Show::latest()->take(4)->get(),
    ]);
});

Route::get('/articles/{article}', [ArticleController::class, 'show']);

Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies/{movie}', [MovieController::class, 'show']);

Route::get('/shows', [ShowController::class, 'index']);
Route::get('/shows/{show}', [ShowController::class, 'show']);

Route::get('/shows/{show}/seasons/{season}', [SeasonController::class, 'show']);

Route::get('/celebrities/{person}', [CelebrityController::class, 'show']);

Route::get('/reviews/sort', [ReviewController::class, 'sort']);

Route::get('/playlists', [PlaylistController::class, 'index']);
Route::get('/playlists/{playlist}', [PlaylistController::class, 'show']);

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/login', [SessionsController::class, 'store']);

    Route::get('/login/github', [SessionsController::class, 'github']);
    Route::get('/login/github/redirect', [SessionsController::class, 'githubRedirect']);
});

Route::middleware('auth')->group(function () {
    Route::delete('/logout', [SessionsController::class, 'destroy']);

    Route::get('/profile', [ProfileController::class, 'edit']);
    Route::patch('/profile', [ProfileController::class, 'update']);

    Route::get('/profile/watchlists', [WatchListController::class, 'index']);
    Route::post('/watchlists', [WatchListController::class, 'store']);
    Route::delete('/watchlists', [WatchListController::class, 'destroy']);

    Route::post('/ratings', [RatingController::class, 'storeOrUpdate']);
    Route::delete('/ratings/{review}', [RatingController::class, 'destroyOrUpdate']);

    Route::get('/profile/reviews', [ReviewController::class, 'index']);
    Route::post('/reviews', [ReviewController::class, 'storeOrUpdate']);
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroyOrUpdate']);

    Route::post('/like', [LikeController::class, 'store']);
    Route::patch('/like', [LikeController::class, 'update']);
    Route::delete('/like', [LikeController::class, 'destroy']);

    Route::post('/dislike', [DislikeController::class, 'store']);
    Route::patch('/dislike', [DislikeController::class, 'update']);
    Route::delete('/dislike', [DislikeController::class, 'destroy']);
});

Route::middleware('can:admin')->group(function () {

    Route::resource('/admin/users', UserController::class);
    Route::resource('/admin/articles', AdminArticleController::class);
    Route::resource('/admin/articles/{article}/contents', AdminContentController::class);
    Route::resource('/admin/movies', AdminMovieController::class);
    Route::resource('/admin/shows', AdminShowController::class);
    Route::resource('/admin/shows/{show}/seasons', AdminSeasonController::class);
    Route::resource('/admin/shows/{show}/seasons/{season}/episodes', AdminEpisodeController::class);
    Route::resource('/admin/people', AdminPersonController::class);
    Route::resource('/admin/playlists', AdminPlaylistController::class);
});



