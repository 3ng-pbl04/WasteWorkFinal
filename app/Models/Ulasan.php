<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'peran',
        'deskripsi',
    ];

    // Validasi rating jika dibutuhkan dalam model

};
