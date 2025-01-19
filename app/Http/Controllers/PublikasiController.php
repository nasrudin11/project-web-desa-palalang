<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Publikasi;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublikasiController extends Controller
{
    public function storeFoto(Request $request)
    {
        $request->validate([
            'judul_foto' => 'required|string|max:150',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);
    
        // Ambil jumlah data saat ini untuk iterasi id berikutnya
        $nextId = Foto::max('id_foto') + 1;
    
        $path = null;
        if ($request->hasFile('foto')) {
            // Tentukan nama file berdasarkan fasilitas{id}
            $filename = 'foto' . $nextId . '.' . $request->file('foto')->getClientOriginalExtension();
            $path = $request->file('foto')->storeAs('galeri', $filename, 'public');
        }

    
        // Simpan data ke database
        Foto::create([
            'judul_foto' => $request->judul_foto,
            'deskripsi' => $request->deskripsi,
            'foto' => $path,
        ]);
    
        return back()->with('success', 'Foto berhasil ditambahkan!');
    }

    public function editFoto(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'judul_foto' => 'required|string|max:150',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string|max:500',
        ]);

        // Cari foto berdasarkan ID
        $foto = Foto::findOrFail($id);

        // Perbarui informasi judul dan deskripsi
        $foto->judul_foto = $validated['judul_foto'];
        $foto->deskripsi = $validated['deskripsi'];

       // Cek apakah ada file foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($foto->foto && Storage::exists('public/' . $foto->foto)) {
                Storage::delete('public/' . $foto->foto);
            }

            $filename = 'foto' . $foto->id_foto . '.' . $request->file('foto')->getClientOriginalExtension();
            $fotoPath = $request->file('foto')->storeAs('galeri', $filename, 'public');
            
            $foto->foto = $fotoPath;
        }


        $foto->save();

        // Redirect atau beri respons sukses
        return back()->with('success', 'Foto berhasil diperbarui');
    }

    public function deleteFoto($id)
    {
        // Cari foto berdasarkan ID
        $foto = Foto::findOrFail($id);

        // Hapus foto dari storage jika ada
        if ($foto->foto && Storage::exists('public/' . $foto->foto)) {
            Storage::delete('public/' . $foto->foto);
        }

        // Hapus data foto dari database
        $foto->delete();

        // Redirect atau beri respons sukses
        return back()->with('success', 'Foto berhasil dihapus');
    }

    
    public function storeVideo(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul_video' => 'required|string|max:150',
            'video_url' => 'required|string',
            'deskripsi' => 'nullable|string',
        ]);

        // Simpan data ke database
        Video::create([
            'judul_video' => $request->judul_video,
            'video_url' => $request->video_url,
            'deskripsi' => $request->deskripsi,
        ]);

        return back()->with('success', 'Video berhasil ditambahkan.');
    }

   
    public function editVideo(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'judul_video' => 'required|string|max:150',
            'video_url' => 'required|string',
            'deskripsi' => 'nullable|string',
        ]);

        // Temukan data video berdasarkan ID
        $video = Video::findOrFail($id);

        // Update data
        $video->update([
            'judul_video' => $request->judul_video,
            'video_url' => $request->video_url,
            'deskripsi' => $request->deskripsi,
        ]);

        return back()->with('success', 'Video berhasil diperbarui.');
    }

    
    public function deleteVideo($id)
    {
        // Temukan data video berdasarkan ID
        $video = Video::findOrFail($id);

        // Hapus data
        $video->delete();

        return back()->with('success', 'Video berhasil dihapus.');
    }

    public function storeBerita(Request $request)
    {
        $request->validate([
            'judul_publikasi' => 'required|string|max:150',
            'foto_publikasi' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'deskripsi_publikasi' => 'required|string|min:10',
        ]);
    
        $nextId = Publikasi::max('id_publikasi') + 1;
    
        $path = null;
        if ($request->hasFile('foto_publikasi')) {
            // Tentukan nama file berdasarkan format berita{id}
            $filename = 'berita' . $nextId . '.' . $request->file('foto_publikasi')->getClientOriginalExtension();
    
            // Simpan file ke folder 'galeri' di penyimpanan publik
            $path = $request->file('foto_publikasi')->storeAs('galeri', $filename, 'public');
        }
    
        // Simpan data ke database
        Publikasi::create([
            'judul_publikasi' => $request->input('judul_publikasi'),
            'foto_publikasi' => $path,
            'deskripsi_publikasi' => $request->input('deskripsi_publikasi'),
            'jenis_publikasi' => 'berita',
        ]);
    
        return back()->with('success', 'Berita berhasil ditambahkan!');
    }

    public function editBerita(Request $request, $id_publikasi)
    {
        $request->validate([
            'judul_publikasi' => 'required|string|max:150',
            'foto_publikasi' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'deskripsi_publikasi' => 'required|string|min:10',
        ]);

        $publikasi = Publikasi::findOrFail($id_publikasi);

        if ($request->hasFile('foto_publikasi')) {
            // Hapus foto lama jika ada
            if ($publikasi->foto_publikasi && Storage::exists('public/' . $publikasi->foto_publikasi)) {
                Storage::delete('public/' . $publikasi->foto_publikasi);
            }

            // Simpan foto baru
            $filename = 'berita' . $id_publikasi . '.' . $request->file('foto_publikasi')->getClientOriginalExtension();
            $fotoPath = $request->file('foto_publikasi')->storeAs('galeri', $filename, 'public');
            $publikasi->foto_publikasi = $fotoPath;
        }

        // Perbarui data lainnya
        $publikasi->judul_publikasi = $request->input('judul_publikasi');
        $publikasi->deskripsi_publikasi = $request->input('deskripsi_publikasi');
        $publikasi->save();

        return back()->with('success', 'Berita berhasil diperbarui!');
    }

    public function deleteBerita($id)
    {
        // Cari foto berdasarkan ID
        $berita = Publikasi::findOrFail($id);

        // Hapus foto dari storage jika ada
        if ($berita->foto_publikasi && Storage::exists('public/' . $berita->foto_publikasi)) {
            Storage::delete('public/' . $berita->foto_publikasi);
        }

        // Hapus data foto dari database
        $berita->delete();

        // Redirect atau beri respons sukses
        return back()->with('success', 'Berita berhasil dihapus');
    }


    public function storePengumuman(Request $request)
    {
        $request->validate([
            'judul_publikasi' => 'required|string|max:150',
            'foto_publikasi' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'deskripsi_publikasi' => 'required|string|min:10',
        ]);
    
        $nextId = Publikasi::max('id_publikasi') + 1;
    
        $path = null;
        if ($request->hasFile('foto_publikasi')) {
            // Tentukan nama file berdasarkan format berita{id}
            $filename = 'pengumuman' . $nextId . '.' . $request->file('foto_publikasi')->getClientOriginalExtension();
    
            // Simpan file ke folder 'galeri' di penyimpanan publik
            $path = $request->file('foto_publikasi')->storeAs('galeri', $filename, 'public');
        }
    
        // Simpan data ke database
        Publikasi::create([
            'judul_publikasi' => $request->input('judul_publikasi'),
            'foto_publikasi' => $path,
            'deskripsi_publikasi' => $request->input('deskripsi_publikasi'),
            'jenis_publikasi' => 'pengumuman',
        ]);
    
        return back()->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    public function editPengumuman(Request $request, $id_publikasi)
    {
        $request->validate([
            'judul_publikasi' => 'required|string|max:150',
            'foto_publikasi' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'deskripsi_publikasi' => 'required|string|min:10',
        ]);

        $publikasi = Publikasi::findOrFail($id_publikasi);

        if ($request->hasFile('foto_publikasi')) {
            // Hapus foto lama jika ada
            if ($publikasi->foto_publikasi && Storage::exists('public/' . $publikasi->foto_publikasi)) {
                Storage::delete('public/' . $publikasi->foto_publikasi);
            }

            // Simpan foto baru
            $filename = 'pengumuman' . $id_publikasi . '.' . $request->file('foto_publikasi')->getClientOriginalExtension();
            $fotoPath = $request->file('foto_publikasi')->storeAs('galeri', $filename, 'public');
            $publikasi->foto_publikasi = $fotoPath;
        }

        // Perbarui data lainnya
        $publikasi->judul_publikasi = $request->input('judul_publikasi');
        $publikasi->deskripsi_publikasi = $request->input('deskripsi_publikasi');
        $publikasi->save();

        return back()->with('success', 'Berita berhasil diperbarui!');
    }

    public function deletePengumuman($id)
    {
        // Cari foto berdasarkan ID
        $pengumuman = Publikasi::findOrFail($id);

        // Hapus foto dari storage jika ada
        if ($pengumuman->foto_publikasi && Storage::exists('public/' . $pengumuman->foto_publikasi)) {
            Storage::delete('public/' . $pengumuman->foto_publikasi);
        }

        // Hapus data foto dari database
        $pengumuman->delete();

        // Redirect atau beri respons sukses
        return back()->with('success', 'Pengumuman berhasil dihapus');
    }
    

}
