<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'no_telp',
        'alamat',
        'keterangan',
        'foto',
        'titik_koordinat',
        'status',
    ];
}
