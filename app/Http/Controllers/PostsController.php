<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->paginate(50);

        return view('posts', ['posts' => $posts]);
    }
}
