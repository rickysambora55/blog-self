<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            [
                'name' => 'CSS',
                'filename' => 'css.webp',
            ],
            [
                'name' => 'HTML',
                'filename' => 'html.webp',
            ],
            [
                'name' => 'Javascript',
                'filename' => 'js.webp',
            ],
            [
                'name' => 'Bootstrap',
                'filename' => 'bootstrap.webp',
            ],
            [
                'name' => 'Tailwind CSS',
                'filename' => 'tailwindcss.webp',
            ],
            [
                'name' => 'Node.js',
                'filename' => 'nodejs.webp',
            ],
            [
                'name' => 'Vite',
                'filename' => 'vite.webp',
            ],
            [
                'name' => 'React',
                'filename' => 'react.webp',
            ],
            [
                'name' => 'Express.js',
                'filename' => 'express.webp',
            ],
            [
                'name' => 'Discord.Js',
                'filename' => 'discordjs.webp',
            ],
            [
                'name' => 'PHP',
                'filename' => 'php.webp',
            ],
            [
                'name' => 'Laravel',
                'filename' => 'laravel.webp',
            ],
            [
                'name' => 'python',
                'filename' => 'python.webp',
            ],
            [
                'name' => 'MySQL',
                'filename' => 'mysql.webp',
            ],
        ];

        foreach ($technologies as $tech) {
            Technology::updateOrCreate(
                ['name' => $tech['name']],
                [
                    'filename' => $tech['filename'],
                    'alt' => $tech['name'],
                ]
            );
        }
    }
}
