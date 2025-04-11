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
                ->when(request()->get('withTags', false), function ($query) {
                    $query->with('postTags');
                })
                ->paginate(50)
        );
    }
}
