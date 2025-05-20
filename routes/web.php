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
Route::get('/', [MovieController::class, 'homepage']);




// Route::resource('/category', CategoryController::class);
// Route::resource('/movie', MovieController::class);

