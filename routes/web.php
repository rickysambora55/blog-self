<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['projects' => Project::all()]);
});

Route::get('/project/{slug}', function ($slug) {
    $project = Arr::first(Project::all(), function ($project) use ($slug) {
        return $project['slug'] == $slug;
    });

    return view('project', ['project' => $project]);
});

Route::get('/login', function () {
    return view('login');
});