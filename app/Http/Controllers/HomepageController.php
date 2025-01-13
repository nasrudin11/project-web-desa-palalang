<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomepageController extends Controller
{
    public function editNavbar(Request $request)
    {
        $data = Homepage::first();
    
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:5120', 
            'nama_website' => 'nullable|string|max:20', 
        ]);
    
        if ($request->hasFile('logo')) {

            if ($data->logo && Storage::exists('public/' . $data->logo)) {
                Storage::delete('public/' . $data->logo);
            }
    
            $logopath = $request->file('logo')->storeAs('logos', 'logo.' . $request->file('logo')->getClientOriginalExtension(), 'public');
            $data->logo = $logopath;
        }
    

        if ($request->has('nama_website')) {
            $data->nama_website = $request->nama_website;
        }
    
        $data->save();
    
        return back()->with('success', 'Navbar berhasil diupdate!');
    }    
    
    
    public function editBanner(Request $request)
    {
        $data = Homepage::first(); // Ambil data pertama
        
        // Validasi input
        $validated = $request->validate([
            'banner_1' => 'nullable|image|mimes:jpeg,png,jpg',
            'banner_2' => 'nullable|image|mimes:jpeg,png,jpg',
            'banner_3' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);
        
        // Proses banner 1
        if ($request->hasFile('banner_1')) {
            // Hapus banner lama jika ada
            if ($data->banner_1 && Storage::exists('public/' . $data->banner_1)) {
                Storage::delete('public/' . $data->banner_1);
            }
            
            // Simpan banner baru dengan nama 'banner1'
            $path1 = $request->file('banner_1')->storeAs('banners', 'banner1.' . $request->file('banner_1')->getClientOriginalExtension(), 'public');
            $data->banner_1 = $path1;
        }
        
        // Proses banner 2
        if ($request->hasFile('banner_2')) {
            // Hapus banner lama jika ada
            if ($data->banner_2 && Storage::exists('public/' . $data->banner_2)) {
                Storage::delete('public/' . $data->banner_2);
            }
            
            // Simpan banner baru dengan nama 'banner2'
            $path2 = $request->file('banner_2')->storeAs('banners', 'banner2.' . $request->file('banner_2')->getClientOriginalExtension(), 'public');
            $data->banner_2 = $path2;
        }
    
        // Proses banner 3
        if ($request->hasFile('banner_3')) {
            // Hapus banner lama jika ada
            if ($data->banner_3 && Storage::exists('public/' . $data->banner_3)) {
                Storage::delete('public/' . $data->banner_3);
            }
            
            // Simpan banner baru dengan nama 'banner3'
            $path3 = $request->file('banner_3')->storeAs('banners', 'banner3.' . $request->file('banner_3')->getClientOriginalExtension(), 'public');
            $data->banner_3 = $path3;
        }
        
        // Simpan perubahan ke database
        $data->save();
    
        return back()->with('success', 'Banner updated successfully!');
    }
    

    public function editKonten(Request $request)
    {
        $data = Homepage::first();
        
        // Validasi input
        $validated = $request->validate([
            'link_video' => 'nullable|string',
            'sejarah_singkat' => 'nullable|string',
        ]);
        
        $data->link_video = $request->link_video ?: $data->link_video;
        $data->sejarah_singkat = $request->sejarah_singkat ?: $data->sejarah_singkat;
        $data->save();

        return back()->with('success', 'Konten updated successfully!');
    }

    public function editFooter(Request $request)
    {
        $data = Homepage::first();

        // Validasi input
        $request->validate([
            'tentang_desa' => 'nullable|string|max:500',
            'pelayanan' => 'nullable|string|max:500',
            'alamat' => 'nullable|string|max:150',
            'nomor_kontak' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:50',
            'link_instagram' => 'nullable|string|max:255',
            'link_tiktok' => 'nullable|string|max:255',
            'link_youtube' => 'nullable|string|max:255',
            'link_facebook' => 'nullable|string|max:255',
        ]);
        
        $data->tentang_desa = $request->tentang_desa ?: $data->tentang_desa;
        $data->pelayanan = $request->pelayanan ?: $data->pelayanan;
        $data->alamat_desa = $request->alamat ?: $data->alamat;
        $data->no_kontak = $request->nomor_kontak ?: $data->nomor_kontak;
        $data->email_desa = $request->email ?: $data->email;
        $data->link_instagram = $request->link_instagram ?: $data->link_instagram;
        $data->link_tiktok = $request->link_tiktok ?: $data->link_tiktok;
        $data->link_youtube = $request->link_youtube ?: $data->link_youtube;
        $data->link_facebook = $request->link_facebook ?: $data->link_facebook;
        $data->save();

        return back()->with('success', 'Footer updated successfully!');
    }
}
