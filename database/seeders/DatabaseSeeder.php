<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Technology;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([TechnologySeeder::class]);

        $maxTechnologies = Technology::count();

        Experience::factory(7)->create();

        $profile = Profile::factory()->create();

        $profile->technologies()->attach(
            Technology::all()->random(rand($maxTechnologies / 2, $maxTechnologies))->pluck('id')->toArray()
        );

        // $projects = Project::factory(10)->has(ProjectImage::factory(1), 'images')->create();
        $projects = Project::factory(10)->create();

        foreach ($projects as $project) {
            $project->technologies()->attach(
                Technology::all()->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
