<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    use HasFactory;

    protected $table = 'publikasis';
    protected $primaryKey = 'id_publikasi';
    protected $fillable = [
        'judul_publikasi',
        'jenis_publikasi',
        'deskripsi_publikasi',
        'foto_publikasi'
    ];

    public $timestamps = false;
}
