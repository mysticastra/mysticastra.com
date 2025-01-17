<?php

namespace Database\Factories;

use App\Enums\CategoryStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->text(20),
            "slug" => $this->faker->unique()->slug,
            "description" => $this->faker->sentence,
            "status" => CategoryStatus::cases()[array_rand(CategoryStatus::cases())],
        ];
    }
}
