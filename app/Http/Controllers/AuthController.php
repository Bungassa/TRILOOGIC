<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect('/admin/dashboard')->with('success', 'Login berhasil! Selamat datang Admin.');
            } elseif ($user->role === 'owner') {
                return redirect('/owner/dashboard')->with('success', 'Login berhasil! Selamat datang Owner.');
            } else {
                return redirect('/')->with('success', 'Login berhasil!');
            }
        }

        // Jika login gagal, kembali ke halaman login dengan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email'));
    }



    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah keluar dari sistem.');
    }

    // Menampilkan halaman lupa password
    public function showForgotPassword()
    {
        return view('forgot-password');
    }

    // Proses kirim link reset password (langsung redirect sesuai permintaan user)
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak terdaftar dalam sistem kami.']);
        }

        // Simpan email ke session agar bisa diambil di halaman reset
        session(['reset_email' => $request->email]);

        // Langsung redirect ke halaman buat password baru dengan token dummy
        return redirect()->route('password.reset', ['token' => 'direct-access']);
    }

    // Menampilkan halaman reset password
    public function showResetPassword($token)
    {
        return view('reset-password', ['token' => $token]);
    }

    // Proses reset password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.']);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login')->with('success', 'Password Anda telah berhasil diperbarui. Silakan login kembali.');
    }
}

