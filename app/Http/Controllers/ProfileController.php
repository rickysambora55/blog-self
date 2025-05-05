<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController
{
    private function getProfile()
    {
        return Profile::first() ?? [];
    }


    public function index()
    {
        return view('profile', [
            'profile' => $this->getProfile()
        ]);
    }

    public function profile()
    {
        return view('admin-profile', [
            'profile' => $this->getProfile()
        ]);
    }

    public function social()
    {
        return view('admin-social', [
            'profile' => $this->getProfile()
        ]);
    }

    public function update(Request $request, Profile $profile)
    {
        $profile = Profile::first();

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|max:255',
            'title' => 'sometimes|required|string|max:255',
            'bio' => 'sometimes|required|string',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'github' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
        ]);

        if ($profile) {
            // Fallback to original values if not provided
            $name = $validated['name'] ?? $profile->name;
            $email = $validated['email'] ?? $profile->email;
            $title = $validated['title'] ?? $profile->title;
            $bio = $validated['bio'] ?? $profile->bio;
            $address = $validated['address'] ?? null;
            $phone = $validated['phone'] ?? null;
            $website = $validated['website'] ?? null;
            $github = $validated['github'] ?? null;
            $linkedin = $validated['linkedin'] ?? null;
            $instagram = $validated['instagram'] ?? null;

            try {
                $profile->update([
                    'name' => $name,
                    'email' => $email,
                    'title' => $title,
                    'bio' => $bio,
                    'address' => $address,
                    'phone' => $phone,
                    'website' => $website,
                    'github' => $github,
                    'linkedin' => $linkedin,
                    'instagram' => $instagram,
                ]);

                return redirect()->back()->with('success', 'Profile updated successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Something went wrong while updating the profile.');
            }
        } else {
            try {
                Profile::create($validated);
                return redirect()->back()->with('success', 'Profile updated successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Something went wrong while updating the profile.');
            }
        }
    }
}
