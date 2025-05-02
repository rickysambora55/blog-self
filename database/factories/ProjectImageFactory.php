<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectImage>
 */
class ProjectImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $used = [];
        $images = [
            'project.png',
            'project - Copy.png',
            'project - Copy (2).png',
            'project - Copy (3).png',
            'project - Copy (4).png',
            'project - Copy (5).png',
            'project - Copy (6).png',
            'project - Copy (7).png',
            'project - Copy (8).png',
            'project - Copy (9).png',
            'project - Copy (10).png',
        ];

        // filter out used filenames
        $available = array_values(array_diff($images, $used));

        if (empty($available)) {
            throw new \Exception('No more unique filenames available for ProjectImage factory.');
        }

        $filename = Arr::random($available);
        $used[] = $filename;

        return [
            'filename' => $filename,
            'alt' => fake()->word(),
            'project_id' => Project::factory(),
        ];
    }
}
