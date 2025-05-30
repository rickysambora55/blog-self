<?php

use App\Models\Project;
use App\Models\Profile;
use App\Models\Experience;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

Route::get('/', function () {
    $projects = Project::latest()->take(8)->get();
    $profile = Profile::firstOrFail();
    $experience = Experience::all()
    ->map(function ($exp) {
        $start = Carbon::parse($exp->start_date);
        $end = $exp->end_date ? Carbon::parse($exp->end_date) : now();

        return [
            'title' => $exp->title,
            'type' => $exp->type,
            'company' => $exp->company,
            'description' => $exp->description,
            'start_date' => $start,
            'end_date' => $end,
            'formatted_date' => $start->translatedFormat('d M Y') . ' - ' .
                                ($exp->end_date ? $end->translatedFormat('d M Y') : 'Now') .
                                ' (' . $start->diffForHumans($end, true) . ')',
        ];
    })
    ->sortByDesc(fn ($exp) => $exp['end_date']->timestamp);


    [$works, $studies] = $experience->partition(function ($exp) {
        return $exp['type'];
    });

    return view('home', [
        'projects' => $projects,
        'profile' => $profile,
        'works' => $works,
        'studies' => $studies
    ]);
});

Route::get('/project/{project:slug}', function (Project $project) {

    return view('project', ['project' => $project]);
});

Route::get('/login', function () {
    return view('login');
});