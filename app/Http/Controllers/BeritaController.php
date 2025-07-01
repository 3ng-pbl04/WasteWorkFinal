<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\PageSetting;
use App\Models\Sampah;
use App\Models\Postingan;
use App\Models\Mitra;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::with('admin')->latest('tanggal')->paginate(6);
        $page_settings = PageSetting::first();

        // Statistik dampak
        $totalBeratKg = Sampah::sum('berat');
        $jumlahSampah = $totalBeratKg >= 1000
            ? number_format($totalBeratKg / 1000, 1) . ' Ton'
            : number_format($totalBeratKg, 0) . ' Kg';

        $jumlahProduk = Postingan::count();
        $jumlahKomunitas = Mitra::count();
        $jumlahPohon = 10000;

        return view('berita.index', compact(
            'beritas',
            'page_settings',
            'jumlahSampah',
            'jumlahProduk',
            'jumlahKomunitas',
            'jumlahPohon'
        ));
    }

    public function show($berita)
    {
        $berita = Berita::with('admin')->findOrFail($berita);
        $page_settings = PageSetting::first();

        $beritaTerbaru = Berita::where('id', '!=', $berita->id)
                            ->latest('tanggal')
                            ->take(5)
                            ->get();

        // Statistik dampak
        $totalBeratKg = Sampah::sum('berat');
        $jumlahSampah = $totalBeratKg >= 1000
            ? number_format($totalBeratKg / 1000, 1) . ' Ton'
            : number_format($totalBeratKg, 0) . ' Kg';

        $jumlahProduk = Postingan::count();
        $jumlahKomunitas = Mitra::count();
        $jumlahPohon = 10000;

        return view('berita.detailberita1', compact(
            'berita',
            'page_settings',
            'beritaTerbaru',
            'jumlahSampah',
            'jumlahProduk',
            'jumlahKomunitas',
            'jumlahPohon'
        ));
    }
}
