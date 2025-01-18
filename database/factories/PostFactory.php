<?php

namespace Database\Factories;

use App\Enums\PostStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
            'title' => $this->faker->sentence,
            'slug' => $this->faker->unique()->slug(),
            'excerpt' => $this->faker->paragraph,
            'content' => $this->faker->randomHtml(),
            'image' => basename($this->faker->imageUrl()),
            'user_id' => User::factory(),
            'status' => $this->faker->randomElement(PostStatus::cases()),
            'scheduled_at' => $this->faker->dateTimeBetween('+1 day', '+1 month'),
        ];
    }
}
