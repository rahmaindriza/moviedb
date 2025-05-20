<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;

// Route untuk halaman utama (home)
// Route::get('/', function () {
//     return view('home');
// });

// // Route untuk halaman welcome
// Route::get('/welcome', function () {
//     return view('welcome');


// });
//yg indri buat
//Route::get('/', [MovieController::class, 'homepage'])->name('home');
//Route::get('/movie/{slug}', [MovieController::class, 'show'])->name('movie.show');

Route::get('/', [MovieController::class, 'homepage']);
Route::get('movie/{id}/{slug}', [MovieController::class, 'detail']);



// Route::resource('/category', CategoryController::class);
// Route::resource('/movie', MovieController::class);

