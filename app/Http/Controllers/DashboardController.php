<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Homepage;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Homepage::first();
        return view ('admin.index', ['title' => 'Dashboard'], compact('data'));
    }

    public function dashboardHomepage()
    {
        $data = Homepage::first();   
        return view('admin.lay-homepage', ['title' => 'Hompage Layouts'], compact('data'));
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
        return view('admin.lay-pemerintahan', ['title' => 'Pemerintahan Layouts'], compact('data'));
    }

    public function dashboardFoto()
    {
        $data = Homepage::first();
        return view('admin.foto', ['title' => 'Foto'], compact('data'));
    }

    public function dashboardVideo()
    {
        $data = Homepage::first();
        return view('admin.video', ['title' => 'Video'], compact('data'));
    }

    public function dashboardBerita()
    {
        $data = Homepage::first();
        return view('admin.berita', ['title' => 'Berita'], compact('data'));
    }

    public function dashboardPengumuman()
    {
        $data = Homepage::first();
        return view('admin.pengumuman', ['title' => 'Pengumuman'], compact('data'));
    }

    public function dashboardPengaduan()
    {
        $data = Homepage::first();
        return view('admin.pengaduan', ['title' => 'Pengaduan'], compact('data'));
    }

    public function dashboardAdminProfile()
    {
        $data = Homepage::first();
        return view('admin.profile', ['title' => 'Profile'], compact('data'));
    }
}
