<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isExperience = fake()->boolean();
        return [
            'title' => $isExperience ? fake()->jobTitle() : fake()->sentence(3),
            'type' => $isExperience,
            'company' => $isExperience ? fake()->company() : fake()->word() . ' University',
            'start_date' => fake()->date(),
            'end_date' => fake()->optional()->date(),
            'description' => fake()->paragraph(),
        ];
    }
}