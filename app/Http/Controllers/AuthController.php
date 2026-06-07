<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordOTP;

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
            \App\Models\ActivityLog::log('Login', 'User ' . $user->name . ' masuk ke sistem');

            if ($user->role === 'admin') {
                return redirect('/admin/dashboard')->with('success', 'Login berhasil! Selamat datang Admin.');
            } elseif ($user->role === 'owner') {
                return redirect('/owner/dashboard')->with('success', 'Login berhasil! Selamat datang Owner.');
            } else {
                return redirect()->intended('/')->with('success', 'Login berhasil!');
            }
        }

        // Jika login gagal, kembali ke halaman login dengan error
        \App\Models\ActivityLog::log('Login Gagal', 'Percobaan login gagal dengan email: ' . $request->email);
        
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email'));
    }
    // Menampilkan halaman register
    public function showRegister()
    {
        return view('register');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'phone.numeric' => 'Nomor WhatsApp harus berupa angka.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        // Login otomatis setelah register
        Auth::login($user);

        return redirect('/')->with('success', 'Registrasi berhasil! Selamat bergabung dengan Ekky Refleksi Family.');
    }



    // Proses logout
    public function logout(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            \App\Models\ActivityLog::log('Logout', 'User ' . $user->name . ' keluar dari sistem');
        }
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

    // Proses kirim OTP ke email
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak terdaftar dalam sistem kami.']);
        }

        // Generate 6 digit OTP
        $otp = rand(100000, 999999);
        
        // Simpan di Cache selama 15 menit
        Cache::put('otp_' . $user->email, $otp, now()->addMinutes(15));
        
        // Kirim email
        Mail::to($user->email)->send(new ResetPasswordOTP($otp));

        // Simpan email ke session agar bisa diambil di halaman verifikasi
        session(['reset_email' => $user->email]);

        return redirect()->route('verify.otp')->with('success', 'Kode OTP telah dikirim ke email Anda.');
    }

    // Menampilkan halaman verifikasi OTP
    public function showVerifyOtp()
    {
        if (!session('reset_email')) {
            return redirect()->route('password.request');
        }
        return view('verify-otp');
    }

    // Proses verifikasi OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric|digits:6',
        ]);

        $email = session('reset_email');
        $cachedOtp = Cache::get('otp_' . $email);

        if (!$cachedOtp || $cachedOtp != $request->otp) {
            return back()->withErrors(['otp' => 'Kode OTP salah atau sudah kadaluarsa.']);
        }

        // OTP Valid, hapus dari cache
        Cache::forget('otp_' . $email);
        
        // Tandai bahwa OTP sudah diverifikasi
        session(['verified_reset_email' => $email]);

        return redirect()->route('password.reset')->with('success', 'OTP valid. Silakan buat password baru.');
    }

    // Menampilkan halaman reset password
    public function showResetPassword()
    {
        if (!session('verified_reset_email')) {
            return redirect()->route('password.request');
        }
        return view('reset-password');
    }

    // Proses reset password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $email = session('verified_reset_email');

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.']);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        session()->forget('reset_email');
        session()->forget('verified_reset_email');

        return redirect('/login')->with('success', 'Password Anda telah berhasil diperbarui. Silakan login kembali.');
    }

    // Google Auth Methods
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->id)->orWhere('email', $googleUser->email)->first();

            if ($user) {
                // Link google_id if not linked
                if (!$user->google_id) {
                    $user->update([
                        'google_id' => $googleUser->id,
                        'avatar' => $googleUser->avatar
                    ]);
                }
            } else {
                // Create new user
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                    'password' => null, // Password will be nullable from migration
                    'role' => 'user' // Default role
                ]);
            }

            Auth::login($user);

            \App\Models\ActivityLog::log('Login', 'User ' . $user->name . ' masuk menggunakan Google');

            if ($user->role === 'admin') {
                return redirect('/admin/dashboard')->with('success', 'Login berhasil! Selamat datang Admin.');
            } elseif ($user->role === 'owner') {
                return redirect('/owner/dashboard')->with('success', 'Login berhasil! Selamat datang Owner.');
            } else {
                return redirect()->intended('/')->with('success', 'Login berhasil dengan Google!');
            }

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Gagal login menggunakan Google. Silakan coba lagi.');
        }
    }
}

