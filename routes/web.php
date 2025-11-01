<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    // Always send root to the login page. Authenticated users can navigate to posts after login.
    return redirect()->route('login');
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
