<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'fasilitas';
    protected $primaryKey = 'id_fasilitas';
    public $timestamps = false;
    protected $fillable = [
        'nama_fasilitas',
        'foto_fasilitas'
    ];

}
