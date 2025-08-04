<?php

use App\Http\Controllers\ExperienceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TechnologyController;

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Project page
Route::get('/project-list', [ProjectController::class, 'projects'])->name('projects');
Route::get('/project/{project:slug}', [ProjectController::class, 'show'])->name('project.show');

// Login page
Route::get('/login', function () {
    return view('login');
});

// Dashboard pages
Route::get('/admin', function () {
    return view('admin');
})->name('admin');
Route::get('/admin/profile', [ProfileController::class, 'profile'])->name('admin-profile');
Route::get('/admin/social', [ProfileController::class, 'social'])->name('admin-social');
Route::get('/admin/project', [ProjectController::class, 'index'])->name('admin-project');
Route::get('/admin/work', [ExperienceController::class, 'work'])->name('admin-work');
Route::get('/admin/study', [ExperienceController::class, 'study'])->name('admin-study');
Route::get('/admin/tech', [TechnologyController::class, 'index'])->name('admin-technology');


// API
Route::post('/api/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/api/social', [ProfileController::class, 'update'])->name('social.update');

Route::post('/api/project', [ProjectController::class, 'store'])->name('project.store');
Route::patch('/api/project/{project}', [ProjectController::class, 'update'])->name('project.update');
Route::delete('/api/project/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');

Route::post('/api/experience', [ExperienceController::class, 'store'])->name('experience.store');
Route::patch('/api/experience/{experience}', [ExperienceController::class, 'update'])->name('experience.update');
Route::delete('/api/experience/{experience}', [ExperienceController::class, 'destroy'])->name('experience.destroy');

Route::post('/api/technology', [TechnologyController::class, 'store'])->name('technology.store');
Route::patch('/api/technology/{technology}', [TechnologyController::class, 'update'])->name('technology.update');
Route::delete('/api/technology/{technology}', [TechnologyController::class, 'destroy'])->name('technology.destroy');
