<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/blog', function () {
    return view('blog', );
});


// Halaman Blog & Posts
// Kita arahkan '/blog' ke PostController agar saat menu Blog diklik, isinya muncul
Route::get('/blog', [PostController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);

// Halaman Categories
Route::get('/categories', [CategoryController::class, 'index']);