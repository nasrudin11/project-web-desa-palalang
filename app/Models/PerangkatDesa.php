<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatDesa extends Model
{
    use HasFactory;

    
    protected $table = 'perangkat_desas';

    protected $primaryKey = 'id_perangkat';

    public $timestamps = false;
    
    protected $fillable = [
        'nama_perangkat',
        'jabatan',
        'foto_perangkat'
    ];
}
