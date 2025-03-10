<?php

use Illuminate\Support\Facades\Route;

$projects = [
    [
        'id' => 1,
        'slug' => 'project-1',
        'title' => 'Project 1',
        'type' => 'A',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'images' => [
            [
                'url' => 'https://placehold.co/300x200',
                'alt' => 'Project 1',
            ],
            [
                'url' => 'https://placehold.co/600x400',
                'alt' => 'Project 1',
            ],
        ],
        'technologies' => [
            'js',
            'react',
            'tailwindcss',
            'mysql',
        ],
    ],
    [
        'id' => 2,
        'slug' => 'project-2',
        'title' => 'Project 2',
        'type' => 'A',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'images' => [
            [
                'url' => 'https://placehold.co/300x200',
                'alt' => 'Project 2',
            ],
            [
                'url' => 'https://placehold.co/600x400',
                'alt' => 'Project 2',
            ],
        ],
        'technologies' => [
            'nodejs',
            'discordjs',
            'mysql',
        ],
    ]
];

Route::get('/', function () use ($projects) {
    return view('home', ['projects' => $projects]);
});

Route::get('/project/{slug}', function ($slug) use ($projects) {
    $project = Arr::first($projects, function ($project) use ($slug) {
        return $project['slug'] == $slug;
    });

    return view('project', ['project' => $project]);
});

Route::get('/login', function () {
    return view('login');
});