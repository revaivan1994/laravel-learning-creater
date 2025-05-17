<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
     public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'user_id' => User::factory(),// если есть user_id
        ];
    }
}
