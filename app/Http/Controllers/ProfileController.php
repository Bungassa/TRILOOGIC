<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Transaksi;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil riwayat pesanan berdasarkan user_id atau nomor telepon user
        $transaksis = collect();
        if ($user) {
            $transaksis = Transaksi::where('user_id', $user->id)
                ->orWhere(function ($query) use ($user) {
                    if ($user->phone) {
                        $query->where('telepon', $user->phone);
                    } else {
                        $query->whereRaw('1=0'); // Jangan cari jika phone null
                    }
                })
                ->with(['layanan', 'testimoni'])
                ->latest()
                ->get();
        }

        return view('profile', compact('user', 'transaksis'));
    }

    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:500',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            'password' => 'nullable|string|min:8|confirmed',
        ]);


        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Update menggunakan model untuk memicu event model jika diperlukan
        User::where('id', $user->id)->update($data);

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}
