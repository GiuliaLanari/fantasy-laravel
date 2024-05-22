<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sport>
 */
class SportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title"=>fake()->words(rand(3,10), true),
            "description"=>fake()->words(rand(10,70), true),
            "img"=>fake()->imageUrl(640, 480),
            "user_id"=>rand(1, 10),
            
        ];
    }
}
