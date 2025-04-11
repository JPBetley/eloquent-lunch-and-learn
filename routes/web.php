<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostsController::class, 'index']);

Route::get('/posts/{post}', function (Post $post) {
    return $post;
});
