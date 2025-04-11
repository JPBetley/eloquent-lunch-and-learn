<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;
use App\Models\PostTag;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $post = Post::factory()->create([
            'title' => 'test',
        ]);
        PostTag::factory()->create([
            'post_id' => $post->id,
        ]);

        dd('Post Count: '.Post::count());
    }
}
