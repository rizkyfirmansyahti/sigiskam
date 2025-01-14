<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AuthControllers extends Controller
{
    public function auth(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Login berhasil, regenerasi sesi
            $request->session()->regenerate();

            // Redirect ke halaman dashboard atau tujuan lain
            return redirect()->intended(route('admin.dashboard'))->with('success', 'Login berhasil!');
        }

        // Login gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('beranda')->with('success', 'Anda telah logout.');
    }
}
