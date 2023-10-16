<?php

use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\admin\MovieController;
use App\Http\Controllers\admin\ShowController;
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
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::resource('/admin/articles', ArticleController::class);

Route::resource('/admin/movies', MovieController::class);

Route::resource('/admin/shows', ShowController::class);
