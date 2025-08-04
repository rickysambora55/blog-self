<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminUser;

class LoginController
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $admin = AdminUser::where('username', $credentials['username'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Auth::guard('web')->login($admin, $request->remember);
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'username' => 'Invalid credentials.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect('/login');
    }
}
