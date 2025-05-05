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
        //
    }
}
