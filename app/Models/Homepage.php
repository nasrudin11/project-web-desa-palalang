<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'homepages';

    protected $primaryKey = 'id_homepage';

    public $timestamps = false;

    protected $fillable = [
        'nama_website',
        'logo',
        'banner_1',
        'banner_2',
        'banner_3',
        'link_video',
        'sejarah_singkat',
        'tentang_desa',
        'pelayanan',
        'alamat_desa',
        'no_kontak',
        'email_desa',
        'link_tiktok',
        'link_facebook',
        'link_youtube',
        'link_instagram',
    ];
}
