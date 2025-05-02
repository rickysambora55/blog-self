<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();
        $username = Str::slug($name, '_');

        return [
            'name' => $name,
            'email' => fake()->unique()->safeEmail(),
            'title' => fake()->jobTitle(),
            'bio' => fake()->paragraph(12),
            'filename1' => 'Person_Hero.webp',
            'filename2' => 'Person_2.webp',
            'address' => fake()->city(),
            'phone' => fake()->phoneNumber(),
            'website' => fake()->url(),
            'github' => $username,
            'linkedin' => $username,
            'instagram' => $username,
        ];
    }
}
