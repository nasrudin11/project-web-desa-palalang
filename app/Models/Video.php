<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'publikasi_video';
    protected $fillable = [
        'judul_video',
        'video_url',
        'deskripsi'
    ];

    public $timestamps = true;
}
