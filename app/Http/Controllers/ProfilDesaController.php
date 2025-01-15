<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilDesaController extends Controller
{
     // Fungsi untuk mengupdate Visi Misi
     public function updateVisiMisi(Request $request)
     {
         $profil = ProfilDesa::first(); 
         $request->validate([
             'visi_misi' => 'required|string',
         ]);
 
         $profil->visi_misi = $request->visi_misi;
         $profil->save();
 
         return back()->with('success', 'Visi dan Misi berhasil diperbarui!');
     }
 
     // Fungsi untuk mengupdate Sejarah Desa
     public function updateSejarah(Request $request)
     {
         $profil = ProfilDesa::first();
         $request->validate([
             'sejarah_desa' => 'required|string',
             'foto_desa' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
         ]);
 
         if ($request->hasFile('foto_desa')) {
             // Hapus file lama jika ada
             if ($profil->foto_desa && Storage::exists('public/' . $profil->foto_desa)) {
                 Storage::delete('public/' . $profil->foto_desa);
             }
 
             // Simpan file baru
             $path = $request->file('foto_desa')->storeAs('desa', 'foto_desa.' . $request->file('foto_desa')->getClientOriginalExtension(), 'public');
             $profil->foto_desa = $path;
         }

         $profil->sejarah_desa = $request->sejarah_desa;
         $profil->save();
 
         return back()->with('success', 'Sejarah Desa berhasil diperbarui!');
     }
 
     // Fungsi untuk mengupdate Link Peta
     public function updatePetaDesa(Request $request)
     {
         $profil = ProfilDesa::first();
         $request->validate([
            'peta_desa_url' => 'required|string',
        ]);
        
         
         $profil->peta_desa_url = $request->peta_desa_url;
         $profil->save();
 
         return back()->with('success', 'Link Peta berhasil diperbarui!');
     }
 
     public function storeFasilitas(Request $request)
     {
         $request->validate([
             'nama_fasilitas' => 'required|string|max:50',
             'foto_fasilitas' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
         ]);
     
         // Ambil jumlah data saat ini untuk iterasi id berikutnya
         $nextId = Fasilitas::max('id_fasilitas') + 1;
     
         $path = null;
         if ($request->hasFile('foto_fasilitas')) {
             // Tentukan nama file berdasarkan fasilitas{id}
             $filename = 'fasilitas' . $nextId . '.' . $request->file('foto_fasilitas')->getClientOriginalExtension();
             $path = $request->file('foto_fasilitas')->storeAs('fasilitas', $filename, 'public');
         }
     
         // Simpan data ke database
         Fasilitas::create([
             'nama_fasilitas' => $request->nama_fasilitas,
             'foto_fasilitas' => $path,
         ]);
     
         return back()->with('success', 'Fasilitas berhasil ditambahkan!');
     }
     
 
    public function updateFasilitas(Request $request, $id)
    {
         // Validasi data
         $request->validate([
             'nama_fasilitas' => 'required|string|max:50',
             'foto_fasilitas' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
         ]);
     
         // Cari fasilitas berdasarkan ID
         $fasilitas = Fasilitas::findOrFail($id);
     
         // Menyimpan foto jika ada perubahan
         $path = $fasilitas->foto_fasilitas; // Gunakan foto lama jika tidak ada foto baru
     
         if ($request->hasFile('foto_fasilitas')) {
             // Hapus foto lama jika ada
             if (file_exists(storage_path('app/public/' . $fasilitas->foto_fasilitas))) {
                 unlink(storage_path('app/public/' . $fasilitas->foto_fasilitas));
             }
     
             // Tentukan nama file baru dan simpan
             $filename = 'fasilitas' . $id . '.' . $request->file('foto_fasilitas')->getClientOriginalExtension();
             $path = $request->file('foto_fasilitas')->storeAs('fasilitas', $filename, 'public');
         }
     
         // Perbarui data fasilitas
         $fasilitas->update([
             'nama_fasilitas' => $request->nama_fasilitas,
             'foto_fasilitas' => $path,
         ]);
     
         return back()->with('success', 'Fasilitas berhasil diperbarui!');
    }
    
    public function deleteFasilitas($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
       
        if ($fasilitas->foto_fasilitas && Storage::exists('public/' . $fasilitas->foto_fasilitas)) {
            Storage::delete('public/' . $fasilitas->foto_fasilitas);
        }

        $fasilitas->delete();

        return redirect()->back()->with('success', 'Fasilitas berhasil dihapus.');
    }

}
