<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    use HasFactory;

    protected $table = 'homepage';
    
    protected $fillable = [
        'nama_website',
        'logo',
        'banner',
        'video_yt_link',
        'sejarah_singkat',
        'tentang_kami',
        'alamat_desa',
        'no_kontak',
        'email_desa',
        'fb_link',
        'ig_link',
        'yt_link',
        'tiktok_link'
    ];
}
