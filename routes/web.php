<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $projects = Project::latest()->take(8)->get();
    return view('home', ['projects' => $projects]);
});

Route::get('/project/{project:slug}', function (Project $project) {

    return view('project', ['project' => $project]);
});

Route::get('/login', function () {
    return view('login');
});