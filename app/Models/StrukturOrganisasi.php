<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'struktur_organisasis';
    protected $primaryKey = 'id_struktur';
    public $timestamps = false;
    
    protected $fillable = ['nama_gambar'];

}
