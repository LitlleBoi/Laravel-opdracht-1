<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

// Compatibility alias for /post pointing to the first or default post
Route::get('/post', function () {
    $firstPost = \App\Models\Post::first();
    return redirect($firstPost ? '/posts/' . $firstPost->slug : '/');
});
