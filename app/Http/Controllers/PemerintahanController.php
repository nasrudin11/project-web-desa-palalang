<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
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

    public function storePerangkatDesa(Request $request)
    {
        $request->validate([
            'nama_perangkat' => 'required|string|max:100',
            'jabatan' => 'required|string|max:50',
            'foto_perangkat' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        // Ambil ID berikutnya berdasarkan data terakhir di tabel
        $nextId = PerangkatDesa::max('id_perangkat') + 1;

        $path = null;
        if ($request->hasFile('foto_perangkat')) {
            // Tentukan nama file berdasarkan ID perangkat
            $filename = 'perangkat' . $nextId . '.' . $request->file('foto_perangkat')->getClientOriginalExtension();
            $path = $request->file('foto_perangkat')->storeAs('perangkat_desa', $filename, 'public');
        }

        // Simpan data perangkat desa
        PerangkatDesa::create([
            'nama_perangkat' => $request->nama_perangkat,
            'jabatan' => $request->jabatan,
            'foto_perangkat' => $path,
        ]);

        return back()->with('success', 'Perangkat desa berhasil ditambahkan!');
    }

    public function editPerangkatDesa(Request $request, $id)
    {
        $request->validate([
            'nama_perangkat' => 'required|string|max:100',
            'jabatan' => 'required|string|max:50',
            'foto_perangkat' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $perangkat = PerangkatDesa::findOrFail($id);

        // Cek apakah ada file baru yang diunggah
        if ($request->hasFile('foto_perangkat')) {
            // Hapus foto lama jika ada
            if ($perangkat->foto_perangkat && file_exists(storage_path('app/public/' . $perangkat->foto_perangkat))) {
                unlink(storage_path('app/public/' . $perangkat->foto_perangkat));
            }

            // Simpan file baru
            $filename = 'perangkat' . $id . '.' . $request->file('foto_perangkat')->getClientOriginalExtension();
            $path = $request->file('foto_perangkat')->storeAs('perangkat_desa', $filename, 'public');
            $perangkat->foto_perangkat = $path;
        }

        // Update data lainnya
        $perangkat->update([
            'nama_perangkat' => $request->nama_perangkat,
            'jabatan' => $request->jabatan,
        ]);

        return back()->with('success', 'Perangkat desa berhasil diperbarui!');
    }

    public function deletePerangkatDesa($id)
    {
        $perangkat = PerangkatDesa::findOrFail($id);

        // Hapus foto jika ada
        if ($perangkat->foto_perangkat && file_exists(storage_path('app/public/' . $perangkat->foto_perangkat))) {
            unlink(storage_path('app/public/' . $perangkat->foto_perangkat));
        }

        // Hapus data perangkat desa
        $perangkat->delete();

        return back()->with('success', 'Perangkat desa berhasil dihapus!');
    }

}
