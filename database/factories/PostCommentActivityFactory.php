<?php

namespace Database\Factories;

use App\Enums\PostCommentType;
use App\Models\PostComment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostCommentActivity>
 */
class PostCommentActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_comment_id' => PostComment::query()->inRandomOrder()->first()->id ?? PostComment::factory(),
            'user_id' => User::query()->inRandomOrder()->first()->id ?? User::factory(),
            'type' => $this->faker->randomElement(PostCommentType::cases()),
        ];
    }
}
