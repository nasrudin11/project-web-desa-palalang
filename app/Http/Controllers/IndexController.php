<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    // Guest Index

    public function index()
    {
        $data = Homepage::first();

        return view('index', ['title' => 'Homepage'], compact('data'));
    }

    public function indexVisiMisi()
    {
        $data = Homepage::first();
        return view('profil.visi-misi', ['title' => 'Visi Misi'], compact('data'));
    }

    public function indexPetaDesa()
    {
        $data = Homepage::first();
        return view('profil.peta-desa', ['title' => 'Peta Desa'], compact('data'));
    }

    public function indexSejarah()
    {
        $data = Homepage::first();
        return view('profil.sejarah', ['title' => 'Sejarah'], compact('data'));
    }

    public function indexFasilitas()
    {
        $data = Homepage::first();
        return view('profil.fasilitas-desa', ['title' => 'Fasilitas'], compact('data'));
    }

    public function indexStruktur()
    {
        $data = Homepage::first();
        return view('pemerintahan.struktur', ['title' => 'Struktur'], compact('data'));
    }

    public function indexPerangkat()
    {
        $data = Homepage::first();
        return view('pemerintahan.perangkat', ['title' => 'Perangkat'], compact('data'));
    }

    public function indexFoto()
    {
        $data = Homepage::first();
        return view('publikasi.foto', ['title' => 'Foto'], compact('data'));
    }

    public function indexFotoD()
    {
        $data = Homepage::first();
        return view('publikasi.foto-dtl', ['title' => 'Foto'], compact('data'));
    }

    public function indexVideo()
    {
        $data = Homepage::first();
        return view('publikasi.video', ['title' => 'Video'], compact('data'));
    }

    public function indexVideoD()
    {
        $data = Homepage::first();
        return view('publikasi.video-dtl', ['title' => 'Video'], compact('data'));
    }

    public function indexBerita()
    {
        $data = Homepage::first();
        return view('publikasi.berita', ['title' => 'Berita'], compact('data'));
    }

    public function indexBeritaD()
    {
        $data = Homepage::first();
        return view('publikasi.berita-dtl', ['title' => 'Berita'], compact('data'));
    }

    public function indexPengumuman()
    {
        $data = Homepage::first();
        return view('publikasi.pengumuman', ['title' => 'Pengumuman'], compact('data'));
    }

    public function indexPengumumanD()
    {
        $data = Homepage::first();
        return view('publikasi.pengumuman-dtl', ['title' => 'Pengumuman'], compact('data'));
    }

    public function indexPengaduan()
    {
        $data = Homepage::first();
        return view('pengaduan', ['title' => 'Pengaduan'], compact('data'));
    }
}
