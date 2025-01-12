<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{

    // Guest Index

    public function index()
    {
        return view('index', ['title' => 'Homepage']);
    }

    public function indexVisiMisi()
    {
        return view('profil.visi-misi', ['title' => 'Visi Misi']);
    }

    public function indexPetaDesa()
    {
        return view('profil.peta-desa', ['title' => 'Peta Desa']);
    }

    public function indexSejarah()
    {
        return view('profil.sejarah', ['title' => 'Sejarah']);
    }

    public function indexFasilitas()
    {
        return view('profil.fasilitas-desa', ['title' => 'Fasilitas']);
    }

    public function indexStruktur()
    {
        return view('pemerintahan.struktur', ['title' => 'Struktur']);
    }

    public function indexPerangkat()
    {
        return view('pemerintahan.perangkat', ['title' => 'Perangkat']);
    }

    public function indexFoto()
    {
        return view('publikasi.foto', ['title' => 'Foto']);
    }

    public function indexFotoD()
    {
        return view('publikasi.foto-dtl', ['title' => 'Foto']);
    }

    public function indexVideo()
    {
        return view('publikasi.video', ['title' => 'Video']);
    }

    public function indexVideoD()
    {
        return view('publikasi.video-dtl', ['title' => 'Video']);
    }

    public function indexBerita()
    {
        return view('publikasi.berita', ['title' => 'Berita']);
    }

    public function indexBeritaD()
    {
        return view('publikasi.berita-dtl', ['title' => 'Berita']);
    }

    public function indexPengumuman()
    {
        return view('publikasi.pengumuman', ['title' => 'Pengumuman']);
    }

    public function indexPengumumanD()
    {
        return view('publikasi.pengumuman-dtl', ['title' => 'Pengumuman']);
    }

    public function indexPengaduan()
    {
        return view('pengaduan', ['title' => 'Pengaduan']);
    }
}
