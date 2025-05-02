<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = [
            'Website',
            'Discord Bot',
            'Mobile App',
            'Desktop App',
            'Game'
        ];

        return [
            'title' => $title = fake()->sentence(3),
            'type' => $type[rand(0, count($type) - 1)],
            'slug' => Str::slug($title),
            'description' => fake()->sentence(10),
        ];
    }
}
