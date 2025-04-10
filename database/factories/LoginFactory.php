<?php

namespace Database\Factories;

use App\Models\Login;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LoginFactory extends Factory
{
    protected $model = Login::class;

    public function definition(): array
    {
        return [
            'ip_address' => $this->faker->ipv4(),
            'created_at' => $this->faker->dateTimeThisDecade('now', 'UTC'),
        ];
    }
}
