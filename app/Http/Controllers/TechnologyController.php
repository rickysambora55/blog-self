<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TechnologyController
{
    public function index()
    {
        $techs = Technology::all();

        return view('admin-technology', ['techs' => $techs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'filename' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        try {
            $imagePath = $request->file('filename')->store('tech', 'public');

            Technology::create([
                'name' => $validated['name'],
                'filename' => $imagePath,
                'alt' => $validated['name'],
            ]);

            return redirect()->back()->with('success', 'Technology created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while saving the technology.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $technology = Technology::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Technology not found.');
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'filename' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $updateData = [];

        // Update name
        if (isset($validated['name'])) {
            $updateData['name'] = $validated['name'];
            $updateData['alt'] = $validated['name'];
        }

        // Handle image upload
        if ($request->hasFile('filename')) {
            // Delete old image
            if ($technology->filename && Storage::disk('public')->exists($technology->filename)) {
                Storage::disk('public')->delete($technology->filename);
            }

            $imagePath = $request->file('filename')->store('tech', 'public');
            $updateData['filename'] = $imagePath;
        }

        try {
            $technology->update($updateData);
            return redirect()->back()->with('success', 'Technology updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while updating the technology.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $technology = Technology::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Technology not found.');
        }

        try {
            if ($technology->filename && Storage::disk('public')->exists($technology->filename)) {
                Storage::disk('public')->delete($technology->filename);
            }

            $technology->delete();
            return redirect()->back()->with('success', 'Technology deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while deleting the technology.');
        }
    }
}
