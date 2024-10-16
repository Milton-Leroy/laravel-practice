<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(10),
            'status' => rand(0,1),
            'publish_date' => fake()->date(),
            'user_id' => 1,
            'category_id' => rand(1,5),
            'views' => rand(0,1000)
        ];
    }
}
