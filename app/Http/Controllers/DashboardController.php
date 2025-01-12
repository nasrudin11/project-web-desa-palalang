<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view ('admin.index', [
            'title' => 'Dashboard'
        ]);
    }

    public function dashboardHomepage()
    {
        return view('admin.lay-homepage', ['title' => 'Hompage Layouts']);
    }

    public function dashboardProfile()
    {
        return view('admin.lay-profile', ['title' => 'Profile Layouts']);
    }

    public function dashboardPemerintahan()
    {
        return view('admin.lay-pemerintahan', ['title' => 'Pemerintahan Layouts']);
    }

    public function dashboardFoto()
    {
        return view('admin.foto', ['title' => 'Foto']);
    }

    public function dashboardVideo()
    {
        return view('admin.video', ['title' => 'Video']);
    }

    public function dashboardBerita()
    {
        return view('admin.berita', ['title' => 'Berita']);
    }

    public function dashboardPengumuman()
    {
        return view('admin.pengumuman', ['title' => 'Pengumuman']);
    }

    public function dashboardPengaduan()
    {
        return view('admin.pengaduan', ['title' => 'Pengaduan']);
    }

    public function dashboardAdminProfile()
    {
        return view('admin.profile', ['title' => 'Profile']);
    }
}
