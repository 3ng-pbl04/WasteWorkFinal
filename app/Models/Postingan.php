<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    protected $fillable = [
    'nama', 'deskripsi', 'gambar', 'harga', 'kategori', 'rating', 'link'
    ];
}
