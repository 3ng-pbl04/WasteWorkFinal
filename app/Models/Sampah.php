<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_sampah',
        'warna',
        'berat',
        'tanggal_masuk',
        'sumber',
        'status',
    ];
}
