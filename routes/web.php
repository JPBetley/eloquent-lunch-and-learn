<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Models\Post;
use App\Models\PostTag;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostsController::class, 'index']);

Route::get('/posts/{post}', function (Post $post) {
    return $post;
});

Route::get('/posts/{post}/tags/{postTag}', function (Post $post, PostTag $postTag) {
    return [
        'post' => $post,
        'postTag' => $postTag,
    ];
});
