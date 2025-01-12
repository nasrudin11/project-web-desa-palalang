<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'publikasi_foto';
    protected $fillable = [
        'judul_foto',
        'deskripsi',
        'foto'
    ];

    public $timestamps = true;
}
