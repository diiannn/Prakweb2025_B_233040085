<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //Authentikasi manual sederhana
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // 1. Validasi input (Tambahkan username)
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users', // Tambahkan validasi username
            'email' => 'required|string|email|max:255|unique:users', // Tambahkan unique biar email ga dobel
            'password' => 'required|string|min:5|confirmed', // Min 5 sesuai request sebelumnya atau 8 terserah
        ]);

        // 2. Simpan ke Database
        User::create([
            'name' => $request->name,
            'username' => $request->username, // Masukkan username
            'email' => $request->email,
            'password' => Hash::make($request->password), // PERBAIKAN: ubah Password jadi password (kecil)
        ]);

        // 3. Redirect
        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan Login.');
    }
}
