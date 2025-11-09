<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;

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

// Comments (public: create, edit/update/destroy restricted via owner token cookie)
Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

// Admin comments management (requires auth)
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // index: list posts that have comments
    Route::get('comments', [AdminCommentController::class, 'index'])->name('comments.index');
    // manage comments for a post
    Route::get('posts/{post}/comments', [AdminCommentController::class, 'show'])->name('comments.show');
    Route::get('posts/{post}/comments/create', [AdminCommentController::class, 'create'])->name('comments.create');
    Route::post('posts/{post}/comments', [AdminCommentController::class, 'store'])->name('comments.store');
    // edit/update/delete comment
    Route::get('comments/{comment}/edit', [AdminCommentController::class, 'edit'])->name('comments.edit');
    Route::put('comments/{comment}', [AdminCommentController::class, 'update'])->name('comments.update');
    Route::delete('comments/{comment}', [AdminCommentController::class, 'destroy'])->name('comments.destroy');
});

// About page (static)
Route::view('/about', 'landing.about')->name('landing.about');
