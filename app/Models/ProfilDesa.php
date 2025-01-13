<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    use HasFactory;

    protected $table = 'profil_desas';
    protected $primaryKey = 'id_profil_desa';
    public $timestamps = false;

    protected $fillable = [
        'visi_misi',
        'foto_desa',
        'sejarah_desa',
        'peta_desa_url'
    ];
}
