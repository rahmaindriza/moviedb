<?php

<<<<<<< HEAD
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\RoleAdmin;
use Illuminate\Support\Facades\Route;


/* --- PUBLIC --- */
Route::get('/',                     [MovieController::class, 'homepage']);
Route::get('movie/{id}/{slug}',     [MovieController::class, 'detail']);


/* --- CATEGORY --- */
Route::resource('/category', CategoryController::class)->middleware('auth');
// Route::resource('/category', CategoryController::class);


/* --- MOVIE CRUD (semua di-proteksi auth) --- */
Route::get('create-movie', [MovieController::class, 'create'])->name('createMovie')->middleware('auth');
Route::post('/movies', [MovieController::class, 'store'])->name('movie.store')->middleware('auth');
// Tampilkan form edit movie
Route::get('/edit-movie/{movie}', [MovieController::class, 'edit'])->name('movie.edit')->middleware('auth', RoleAdmin::class);
// Proses update movie
Route::put('/update-movie/{id}', [MovieController::class, 'update'])->middleware('auth', RoleAdmin::class);
// Proses hapus movie
Route::delete('/delete-movie/{movie}', [MovieController::class, 'destroy'])->middleware('auth')->name('movie.destroy');



/* --- AUTH --- */
Route::get('/login',  [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout',[AuthController::class, 'logout']);
// Route::post('/movie', [MovieController::class, 'store']);

Route::get('/data-movie', [MovieController::class, 'dataMovie'])->middleware('auth');
// Route::get('/data-movie', [MovieController::class, 'dataMovie'])->middleware('auth')->name('movie.index');



=======
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MovieController::class, 'homepage']);

Route::resource('/category', CategoryController::class);
// Route::resource('/movie', MovieController::class);
>>>>>>> 2bfdd808c2f53f4f8940aa2f69949dacaa1ad5fc

// Route::get('/movie/{slug}', [MovieController::class, 'show'])->name('movies.show');
// Route::get('/movie/{id}/{slug}', [MovieController::class, 'detail']);

Route::get('movie/{id}/{slug}', [MovieController::class, 'detail']);
// Route::get('create-movie', [MovieController::class, 'create'])->name('createMovie');
Route::get('create-movie', [MovieController::class, 'create'])->name('createMovie');
// Route::get('/create-movie', [MovieController::class, 'create'])->name('createMovie');
// Route::post('/movie', [MovieController::class, 'store'])->name('movie.store');
// Route::get('/create-movie', [MovieController::class, 'create'])->name('movies.create');
// Route::get('/create-movie', [MovieController::class, 'create'])->name('create_movie');
Route::post('/movies', [MovieController::class, 'store'])->name('movie.store');

// Route::post('/movie', [MovieController::class, 'store']);
