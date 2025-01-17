<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Foto;
use App\Models\Homepage;
use App\Models\Pengaduan;
use App\Models\PerangkatDesa;
use App\Models\ProfilDesa;
use App\Models\Publikasi;
use App\Models\StrukturOrganisasi;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Homepage::first();
        $fotoCount = Foto::count();  
        $videoCount = Video::count();  
        $beritaCount = Publikasi::where('jenis_publikasi', 'berita')->count(); 
        $pengumumanCount = Publikasi::where('jenis_publikasi', 'pengumuman')->count();  

        return view('admin.index', ['title' => 'Dashboard'], compact('data', 'fotoCount', 'videoCount', 'beritaCount', 'pengumumanCount'));
    }

    public function dashboardHomepage()
    {
        $data = Homepage::first();   
        return view('admin.lay-homepage', ['title' => 'Homepage Layouts'], compact('data'));
    }

    public function dashboardProfile()
    {
        $data = Homepage::first();
        $profile = ProfilDesa::first();
        $fasilitas = Fasilitas::all();

        return view('admin.lay-profile', ['title' => 'Profile Layouts'], compact('data','profile','fasilitas'));
    }

    public function dashboardPemerintahan()
    {
        $data = Homepage::first();
        $struktur = StrukturOrganisasi::first();
        $perangkat = PerangkatDesa::all();
        
        return view('admin.lay-pemerintahan', ['title' => 'Pemerintahan Layouts'], compact('data', 'struktur', 'perangkat'));
    }

    public function dashboardFoto()
    {
        $data = Homepage::first();
        $foto = Foto::all();
        return view('admin.foto', ['title' => 'Foto'], compact('data', 'foto'));
    }

    public function dashboardVideo()
    {
        $data = Homepage::first();
        $video = Video::all();
        return view('admin.video', ['title' => 'Video'], compact('data', 'video'));
    }

    public function dashboardBerita()
    {
        $data = Homepage::first();
        $berita = Publikasi::where('jenis_publikasi', 'berita')->get();
        return view('admin.berita', ['title' => 'Berita'], compact('data', 'berita'));
    }


    public function dashboardPengumuman()
    {
        $data = Homepage::first();
        $pengumuman = Publikasi::where('jenis_publikasi', 'pengumuman')->get();
        return view('admin.pengumuman', ['title' => 'Pengumuman'], compact('data', 'pengumuman'));
    }

    public function dashboardPengaduan()
    {
        $data = Homepage::first();
        $pengaduan = Pengaduan::all();
        return view('admin.pengaduan', ['title' => 'Pengaduan'], compact('data', 'pengaduan'));
    }

    public function dashboardPengaduanDtl()
    {
        $data = Homepage::first();
        $pengaduan = Pengaduan::all();
        return view('admin.pengaduan-dtl', ['title' => 'Pengaduan'], compact('data', 'pengaduan'));
    }

    public function dashboardAdminProfile()
    {
        $data = Homepage::first();
        $user = Auth::user();
        return view('admin.profile', ['title' => 'Profile'], compact('data', 'user'));
    }
}
