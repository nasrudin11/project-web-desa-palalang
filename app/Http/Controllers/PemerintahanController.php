<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PemerintahanController extends Controller
{

    public function updateStruktur(Request $request)
    {
        $struktur = StrukturOrganisasi::first();
        $request->validate([
            'gambar_struktur' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        
        if ($request->hasFile('gambar_struktur')) {
            // Hapus file lama jika ada
            if ($struktur->gambar_struktur && Storage::exists('public/' . $struktur->gambar_struktur)) {
                Storage::delete('public/' . $struktur->gambar_struktur);
            }

            // Simpan file baru
            $path = $request->file('gambar_struktur')->storeAs('struktur', 'struktur.' . $request->file('gambar_struktur')->getClientOriginalExtension(), 'public');
            $struktur->gambar_struktur = $path;
        }

        $struktur->save();

        return back()->with('success', 'Sejarah Desa berhasil diperbarui!');
    }
}
