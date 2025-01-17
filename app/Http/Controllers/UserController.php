<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function updateProfile(Request $request)
    {
        $user = Auth::user(); // Ambil data user yang sedang login

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id, 
            'no_tlp' => 'nullable|string|max:15',
            'gambar_profil' => 'nullable|image|mimes:jpg,png,jpeg|max:5120',
        ]);

        // Update data user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_tlp = $request->no_tlp;

        // Cek apakah ada file foto baru
        if ($request->hasFile('gambar_profil')) {
            // Hapus gambar lama jika ada
            if ($user->gambar_profil && Storage::exists('public/' . $user->gambar_profil)) {
                Storage::delete('public/' . $user->gambar_profil);
            }

            // Simpan gambar baru
            $filename = 'profile' . $user->id . '.' . $request->file('gambar_profil')->getClientOriginalExtension();
            $userPath = $request->file('gambar_profil')->storeAs('profile', $filename, 'public');
            
            $user->gambar_profil = $userPath; // Perbaikan pada atribut penyimpanan gambar
        }

        $user->save(); // Simpan perubahan ke database

        // Redirect ke halaman profile dengan pesan sukses
        return back()->with('success', 'Profil berhasil diperbarui!');

    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user(); 

        // Validasi input
        $request->validate([
            'password' => [
                'required',
                'string',
                'min:8', // Minimal 8 karakter
                'regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/', // Harus ada huruf dan angka
                'confirmed' // Konfirmasi password harus cocok
            ],
        ], [
            'password.regex' => 'Password harus mengandung kombinasi huruf dan angka.',
        ]);

        // Update password user
        $user->password = Hash::make($request->password); // Hash password baru
        $user->save(); // Simpan perubahan  

        // Redirect dengan pesan sukses
        return back()->with('success', 'Password berhasil diperbarui!');

    }
}
