<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    // NAMA METHOD TETAP 'Login' (Sesuai Modul)
    public function Login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Logic login
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard'); // Atau '/dashboard'
        }

        // Login gagal
        return back()->withErrors([
            'email' => 'Email atau Password Salah',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        // PERBAIKAN TYPO: Tanda "-" diganti jadi "->"
        $request->session()->regenerateToken();

        return redirect('/');
    }
}