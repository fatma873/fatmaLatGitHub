<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ======== FORM ========
    public function showUserRegisterForm()
    {
        return view('auth.register-user');
    }

    public function showAdminRegisterForm()
    {
        return view('auth.register-admin');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    // ======== REGISTER ========
    public function registerUser(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password, // << nggak di-hash brooo
            'role'     => 'user',
        ]);

        return redirect()->route('login')->with('success', 'Berhasil daftar! Silakan login.');
    }

    public function registerAdmin(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password, // << nggak di-hash juga
            'role'     => 'admin',
        ]);

        return redirect()->route('login')->with('success', 'Admin berhasil terdaftar! Silakan login.');
    }

    // ======== LOGIN ========
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // AUTH MANUAL karena password-nya nggak di-hash
        $user = User::where('email', $credentials['email'])
                    ->where('password', $credentials['password']) // <- langsung cocok plaintext
                    ->first();

        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();

            return $user->role === 'admin'
                ? redirect()->route('admin.dashboard')
                : redirect()->route('user.dashboard');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
