<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ExperienceController
{
    private function getExperiences()
    {
        $experiences = Experience::all()->map(function ($exp) {
            $start = Carbon::parse($exp->start_date);
            $end = $exp->end_date ? Carbon::parse($exp->end_date) : now();
            $endDisplay = $exp->end_date ? Carbon::parse($exp->end_date) : null;

            return [
                'id' => $exp->id,
                'title' => $exp->title,
                'type' => $exp->type,
                'company' => $exp->company,
                'description' => $exp->description,
                'start_date' => $start,
                'end_date' => $endDisplay,
                'end_date_calculated' => $end,
                'formatted_date' => $start->translatedFormat('d M Y') . ' - ' .
                    ($exp->end_date ? $end->translatedFormat('d M Y') : 'Now') .
                    ' (' . $start->diffForHumans($end, true) . ')',
            ];
        })
            ->sortByDesc(fn($exp) => $exp['end_date_calculated']->timestamp);


        [$works, $studies] = $experiences->partition(function ($exp) {
            return $exp['type'];
        });

        return [
            'works' => $works,
            'studies' => $studies,
        ];
    }

    public function work()
    {
        $works = $this->getExperiences()['works'];
        return view('admin-work', ['works' => $works]);
    }

    public function study()
    {
        $studies = $this->getExperiences()['studies'];
        return view('admin-study', ['studies' => $studies]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|boolean',
            'company' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        try {
            Experience::create($validated);
            return redirect()->back()->with('success', 'Experience added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while saving the project.');
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $experience = Experience::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Experience not found.');
        }

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'type' => 'sometimes|boolean',
            'company' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'start_date' => 'sometimes|date',
            'end_date' => 'nullable|date',
        ]);

        // Fallback to original values if not provided
        $title = $validated['title'] ?? $experience->title;
        $type = $validated['type'] ?? $experience->type;
        $company = $validated['company'] ?? $experience->company;
        $description = $validated['description'] ?? $experience->description;
        $start_date = $validated['start_date'] ?? $experience->start_date;
        $end_date = $validated['end_date'] ?? $experience->end_date;

        try {
            $experience->update([
                'title' => $title,
                'type' => $type,
                'company' => $company,
                'description' => $description,
                'start_date' => $start_date,
                'end_date' => $end_date,
            ]);

            return redirect()->back()->with('success', 'Experience updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while updating the project.');
        }
    }

    public function destroy(string $id)
    {
        try {
            $experience = Experience::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Experience not found.');
        }

        try {
            $experience->delete();
            return redirect()->back()->with('success', 'Experience deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while deleting the ex$experience.');
        }
    }
}
