<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardCategoryController;

// ... (Route Home, About, Blog, Categories tetap sama) ...

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});
Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});
Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
Route::get('/blog', [PostController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);


// === AUTH ROUTES (SESUAI MODUL) ===

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']); // Modul pakai 'register'

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

    // PERBAIKAN: Ubah jadi 'Login' agar sesuai dengan controller kamu
    Route::post('/login', [LoginController::class, 'Login']);
});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');


// === DASHBOARD ROUTES ===
// Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {
//     // ... other dashboard routes

// });
// routes/web.php

// routes/web.php

Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {

    // 1. Rute Dashboard Index (URI: /dashboard, Name: dashboard.index)
    Route::get('/', [DashboardPostController::class, 'index'])->name('index');

    // 2. Rute CATEGORIES (MENGGUNAKAN RESOURCE)
    // Ini otomatis membuat rute edit kategori: 
    // URI: /dashboard/categories/{category}/edit
    // NAME: dashboard.categories.edit
    Route::resource('categories', App\Http\Controllers\DashboardCategoryController::class)
        ->names('categories')
        ->parameters([
            'categories' => 'category:slug' // <-- PERUBAHAN KRUSIAL INI
        ])
        ->except(['show']);

    // 3. Rute POSTS (Yang menggunakan wildcard, diletakkan setelah rute spesifik di atas)
    // Rute Edit Post, Show Post, dll.
    Route::get('/create', [DashboardPostController::class, 'create'])->name('create');
    Route::post('/', [DashboardPostController::class, 'store'])->name('store');


    // Pastikan rute edit post berada di atas rute show post untuk menghindari konflik
    Route::get('/{post:slug}/edit', [DashboardPostController::class, 'edit'])->name('edit');
    Route::put('/{post:slug}', [DashboardPostController::class, 'update'])->name('update');
    Route::delete('/{post:slug}', [DashboardPostController::class, 'destroy'])->name('destroy');
    Route::get('/{post:slug}', [DashboardPostController::class, 'show'])->name('show');
});