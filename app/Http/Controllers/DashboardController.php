<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Technology;
use Illuminate\Http\Request;

class DashboardController
{
    public function index()
    {
        return view('admin', [
            'projectsCount' => Project::count(),
            'techCount' => Technology::count(),
            'experienceCount' => Experience::work()->count(),
            'educationCount' => Experience::study()->count(),
            'recentProjects' => Project::latest()->take(6)->get(),
            'profile' => Profile::first(),
        ]);
    }
}
