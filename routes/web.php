<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    // Show the public landing index as the site's root page.
    return view('landing.index');
});

// Posts resource (index/show public). create/edit/delete require auth via controller middleware.
Route::resource('posts', PostController::class);
Route::resource('categories', \App\Http\Controllers\CategoryController::class);

// Auth (custom minimal)
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Profile management (edit/update/delete) for authenticated user
Route::middleware('auth')->group(function () {
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Landing page (user-facing template)
Route::get('/landing', function () {
    return view('landing.index');
})->name('landing');

// Blog page for landing
use App\Http\Controllers\LandingBlogController;

Route::get('/blog', [LandingBlogController::class, 'index'])->name('landing.blog');
Route::get('/blog/{slug}', [LandingBlogController::class, 'show'])->name('landing.blog.show');

// About page (static)
Route::view('/about', 'landing.about')->name('landing.about');
