<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showUserForm()
    {
        return view('auth.register-user');
    }

    public function showAdminForm()
    {
        return view('auth.register-admin');
    }

    public function registerUser(Request $request)
    {
        $this->validateForm($request);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user',
        ]);

        return redirect()->route('login')->with('success', 'Berhasil daftar sebagai user!');
    }

    public function registerAdmin(Request $request)
    {
        $this->validateForm($request);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'admin',
        ]);

        return redirect()->route('login')->with('success', 'Berhasil daftar sebagai admin!');
    }

    private function validateForm(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
    }
}

