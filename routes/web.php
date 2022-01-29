<?php

use App\Http\Controllers\ActorsController;
use App\Http\Controllers\MovieController;
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

Route::get('/about', function () {
	return view('about.index');
});

//get,post,put,patch,delete, any,match,redirect,resource, view
Route::get("/", function () {
	return view("home.index");
});

// Route::get('/movies', [MovieController::class, 'index'])
//     ->name('movies.index');

// Route::get('/movies/create', [MovieController::class, 'create'])
//     ->name('movies.create');

// Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])
//     ->name('movies.destroy');

Route::resource('movies', MovieController::class);

Route::resource('actors', ActorsController::class);
