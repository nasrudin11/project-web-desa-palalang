<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    protected $fillable = [
        'nama',
        'dusun',
        'jenis_aduan',
        'nomor_hp',
        'alamat',
        'deskripsi'
    ];

    public $timestamps = true;
}
