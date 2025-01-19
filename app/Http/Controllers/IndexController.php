<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Foto;
use App\Models\Homepage;
use App\Models\PerangkatDesa;
use App\Models\ProfilDesa;
use App\Models\Publikasi;
use App\Models\StrukturOrganisasi;
use App\Models\Video;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    // Guest Index

    public function index()
    {
        $data = Homepage::first();
        $berita = Publikasi::where('jenis_publikasi', 'berita')->get();
        $pengumuman = Publikasi::where('jenis_publikasi', 'pengumuman')->get();
        return view('index', ['title' => 'Homepage'], compact('data', 'berita', 'pengumuman'));
    }

    public function indexVisiMisi()
    {
        $data = Homepage::first();
        $profile = ProfilDesa::first();
        return view('profil.visi-misi', ['title' => 'Visi Misi'], compact('data', 'profile'));
    }

    public function indexPetaDesa()
    {
        $data = Homepage::first();
        $profile = ProfilDesa::first();

        return view('profil.peta-desa', ['title' => 'Peta Desa'], compact('data', 'profile'));
    }

    public function indexSejarah()
    {
        $data = Homepage::first();
        $profile = ProfilDesa::first();

        return view('profil.sejarah', ['title' => 'Sejarah'], compact('data', 'profile'));
    }

    public function indexFasilitas()
    {
        $data = Homepage::first();
        $fasilitas = Fasilitas::all();
        return view('profil.fasilitas-desa', ['title' => 'Fasilitas'], compact('data', 'fasilitas'));
    }

    public function indexStruktur()
    {
        $data = Homepage::first();
        $struktur = StrukturOrganisasi::first();
        return view('pemerintahan.struktur', ['title' => 'Struktur'], compact('data', 'struktur'));
    }

    public function indexPerangkat()
    {
        $data = Homepage::first();
        $perangkat = PerangkatDesa::all();
        return view('pemerintahan.perangkat', ['title' => 'Perangkat'], compact('data', 'perangkat'));
    }

    public function indexFoto()
    {
        $data = Homepage::first();
        $foto = Foto::all();
        return view('publikasi.foto', ['title' => 'Foto'], compact('data', 'foto'));
    }

    public function indexFotoD($id)
    {
        $data = Homepage::first();
        $foto = Foto::findOrFail($id);
        return view('publikasi.foto-dtl', ['title' => 'Foto'], compact('data', 'foto'));
    }

    public function indexVideo()
    {
        $data = Homepage::first();
        $video = Video::all();
        return view('publikasi.video', ['title' => 'Video'], compact('data', 'video'));
    }

    public function indexVideoD($id)
    {
        $data = Homepage::first();
        $video = Video::findOrFail($id);
        return view('publikasi.video-dtl', ['title' => 'Video'], compact('data', 'video'));
    }

    public function indexBerita()
    {
        
        $data = Homepage::first();
        
        $beritaTerbaru = Publikasi::where('jenis_publikasi', 'berita')
                                  ->orderBy('created_at', 'desc')
                                  ->limit(4)
                                  ->get();
    
        $berita = Publikasi::where('jenis_publikasi', 'berita')
                           ->orderBy('created_at', 'desc')
                           ->paginate(10);
    
        // Kirim data ke view
        return view('publikasi.berita', ['title' => 'Berita'], compact(
            'data', 
            'beritaTerbaru', 
            'berita'
        ));
    }
    

    public function indexBeritaD($id)
    {
        $data = Homepage::first();
        $beritaTerbaru = Publikasi::where('jenis_publikasi', 'berita')
                                  ->orderBy('created_at', 'desc')
                                  ->limit(4)
                                  ->get();

        $berita = Publikasi::findOrFail($id);
        return view('publikasi.berita-dtl', ['title' => 'Berita'], compact('data', 'berita', 'beritaTerbaru'));
    }

    public function indexPengumuman()
    {
        $data = Homepage::first();
              
        $pengumumanTerbaru = Publikasi::where('jenis_publikasi', 'pengumuman')
                                    ->orderBy('created_at', 'desc')
                                    ->limit(4)
                                    ->get();

        
        $pengumuman = Publikasi::where('jenis_publikasi', 'pengumuman')
                                ->orderBy('created_at', 'desc')
                                ->paginate(10);
        return view('publikasi.pengumuman', ['title' => 'Pengumuman'], compact(
            'data',
            'pengumumanTerbaru',
            'pengumuman'
        ));
    }

    

    public function indexPengumumanD($id)
    {
        $data = Homepage::first();
        $pengumumanTerbaru = Publikasi::where('jenis_publikasi', 'pengumuman')
                                        ->orderBy('created_at', 'desc')
                                        ->limit(4)
                                        ->get();

        $pengumuman = Publikasi::findOrFail($id);
        return view('publikasi.pengumuman-dtl', ['title' => 'Pengumuman'], compact(
            'data', 
            'pengumuman', 
            'pengumumanTerbaru'
        ));
    }

    public function indexPengaduan()
    {
        $data = Homepage::first();
        return view('pengaduan', ['title' => 'Pengajuan'], compact('data'));
    }
}
