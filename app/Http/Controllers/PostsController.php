<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        return PostResource::collection(
            Post::query()
                ->paginate(50)
        );
    }
}
