<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Project page
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


// API
Route::post('/api/project', [ProjectController::class, 'store'])->name('project.store');
Route::patch('/api/project/{project}', [ProjectController::class, 'update'])->name('project.update');
Route::delete('/api/project/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');
