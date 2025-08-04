<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProjectController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin-project', ['projects' => $projects]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            'filenames' => 'required|array|max:5',
            'filenames.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $projectData = Arr::only($validated, ['title', 'type', 'description']);
        $projectData['slug'] = Str::slug($projectData['title']);
        $originalSlug = $projectData['slug'];
        $counter = 1;
        while (Project::where('slug', $projectData['slug'])->exists()) {
            $projectData['slug'] = $originalSlug . '-' . $counter++;
        }

        try {
            $project = Project::create($projectData);
            if ($request->hasFile('filenames')) {
                foreach ($request->file('filenames') as $image) {
                    $filename = $image->store('projects', 'public');
                    $project->images()->create(['filename' => $filename, 'alt' => $projectData['title']]);
                }
            }
            return redirect()->back()->with('success', 'Project created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while saving the project.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('project', ['project' => $project]);
    }

    /**
     * Project List
     */
    public function projects()
    {
        $projects = Project::all();

        return view('project-list', ['projects' => $projects]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $project = Project::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Project not found.');
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'filenames' => 'required|array|max:5',
            'filenames.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Fallback to original values if not provided
        $title = $validated['title'] ?? $project->title;
        $type = $validated['type'] ?? $project->type;
        $description = $validated['description'] ?? $project->description;

        // Generate a slug based on title
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;
        while (Project::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        try {
            $project->update([
                'title' => $title,
                'type' => $type,
                'description' => $description,
                'slug' => $slug,
            ]);

            // Handle uploaded images
            if ($request->hasFile('filenames')) {
                // 1. Delete old images from storage
                foreach ($project->images as $image) {
                    Storage::disk('public')->delete($image->filename);
                    $image->delete();
                }

                // 2. Upload new images
                foreach ($request->file('filenames') as $image) {
                    $filename = $image->store('projects', 'public');
                    $project->images()->create([
                        'filename' => $filename,
                        'alt' => $title,
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Project updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while updating the project.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $project = Project::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Project not found.');
        }

        try {
            if ($project->images) {
                foreach ($project->images as $image) {
                    Storage::disk('public')->delete($image->filename);
                    $image->delete();
                }
            }

            $project->delete();
            return redirect()->back()->with('success', 'Project deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while deleting the project.');
        }
    }
}
