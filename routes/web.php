<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return redirect()->route('posts.index');
});

// Posts resource (index/show public). create/edit/delete require auth via controller middleware.
Route::resource('posts', PostController::class);
Route::resource('categories', \App\Http\Controllers\CategoryController::class);
