<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
final class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->name(),
            'source' => $this->faker->paragraph(),
            'is_publish' => $this->faker->boolean(),
            'is_pickup' => 0,
            'is_save' => $this->faker->boolean(),
        ];
    }
}
