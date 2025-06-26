<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\PageSetting;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
  public function show($id)
{
    $berita = Berita::with('admin')->findOrFail($id);
    $page_settings = PageSetting::first();

    $beritaTerbaru = Berita::where('id', '!=', $id)
                        ->latest('tanggal')
                        ->take(5)
                        ->get();

    return view('berita.detailberita1', compact(
        'berita',
        'page_settings',
        'beritaTerbaru'
    ));
}
}
