<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostComment>
 */
class PostCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id' => Post::query()->inRandomOrder()->first()->id ?? Post::factory(),
            'user_id' => User::query()->inRandomOrder()->first()->id ?? User::factory(),
            'content' => $this->faker->paragraph,
            'is_approved' => $this->faker->boolean,
            'approved_at' => $this->faker->dateTimeThisYear,
            'approved_by' => User::query()->inRandomOrder()->first()->id ?? User::factory(),
            'parent_id' => null,
        ];
    }
}
