<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:5'
    ]);

    $user = \App\Models\User::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors([
            'email' => 'Email tidak ditemukan',
        ])->onlyInput('email');
    }

    if (!Hash::check($request->password, $user->password)) {
        return back()->withErrors([
            'password' => 'Password salah',
        ])->onlyInput('email');
    }

    // Coba login secara langsung
    if (Auth::attempt([
        'email' => $request->email,
        'password' => $request->password
    ])) {
        $request->session()->regenerate();
        return redirect('/')->with('success', 'Selamat datang, ' . Auth::user()->name);
    }

    // Harusnya tidak pernah sampai sini
    return back()->withErrors([
        'email' => 'Login gagal karena tidak diketahui',
    ])->onlyInput('email');
}


    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')-> with ('success', 'Anda telah Logout dari Website ');
    }
}
