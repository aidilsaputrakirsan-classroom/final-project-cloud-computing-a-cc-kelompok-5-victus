<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\LandingBlogController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;

Route::get('/', function () {
    return view('landing.index');
});

Route::resource('posts', PostController::class);
Route::resource('categories', \App\Http\Controllers\CategoryController::class);

// Auth (custom minimal)
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/landing', function () {
    return view('landing.index');
})->name('landing');

Route::get('/blog', [LandingBlogController::class, 'index'])->name('landing.blog');
Route::get('/blog/{slug}', [LandingBlogController::class, 'show'])->name('landing.blog.show');

Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::resource('tags', TagController::class)->except('show');

    Route::get('comments', [AdminCommentController::class, 'index'])->name('comments.index');
    Route::get('posts/{post}/comments', [AdminCommentController::class, 'show'])->name('comments.show');
    Route::get('posts/{post}/comments/create', [AdminCommentController::class, 'create'])->name('comments.create');
    Route::post('posts/{post}/comments', [AdminCommentController::class, 'store'])->name('comments.store');
    Route::get('comments/{comment}/edit', [AdminCommentController::class, 'edit'])->name('comments.edit');
    Route::put('comments/{comment}', [AdminCommentController::class, 'update'])->name('comments.update');
    Route::delete('comments/{comment}', [AdminCommentController::class, 'destroy'])->name('comments.destroy');
});

Route::view('/about', 'landing.about')->name('landing.about');