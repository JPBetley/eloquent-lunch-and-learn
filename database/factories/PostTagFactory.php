<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostTag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use PharIo\Manifest\Author;

class PostTagFactory extends Factory
{
    protected $model = PostTag::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'type' => $this->faker->randomElement(['post', 'author']),
            'post_id' => Post::factory()->create()->id,
            //'author_id' => Author::factory()->firstOrFail(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
