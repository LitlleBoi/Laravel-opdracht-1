<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('posts');
});

Route::get('/posts', function () {
    return view('posts');
});

Route::get('/post', function () {
    return view('post');
});

Route::get('/posts/{post}', function ($post) {
    return view('post', ['post' => $post]);
});
