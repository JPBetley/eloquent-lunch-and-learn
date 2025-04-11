<?php

namespace Database\Factories;

use App\Models\PostImage;
use App\Models\PostTag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostTagFactory extends Factory
{
    protected $model = PostTag::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'type' => $this->faker->randomElement(['post', 'author']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
