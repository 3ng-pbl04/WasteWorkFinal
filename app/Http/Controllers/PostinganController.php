<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Mitra;
use App\Models\PageSetting;
use App\Models\Postingan;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class PostinganController extends Controller
{
    // Menampilkan semua postingan ke halaman welcome.blade.php
    public function index()
    {
        $postingans = Postingan::orderBy('id', 'asc')->take(6)->get();
        $beritas = Berita::orderBy('id', 'desc')->take(3)->get();
        $ulasans = Ulasan::latest()->take(5)->get();
        $page_settings = PageSetting::first();
        $mitras = Mitra::latest()->take(5)->get();


        return view('welcome', compact(
            'postingans',
            'beritas',
            'ulasans',
            'page_settings',
            'mitras'

        ));
    }

    // Menampilkan detail berita
    public function show($id)
    {
        $berita = Berita::with('admin')->findOrFail($id);
        $page_settings = PageSetting::first();

        // Ambil 2 berita terbaru lainnya, kecuali yang sedang dibuka
        $beritaTerbaru = Berita::where('id', '!=', $id)
                            ->latest('tanggal')
                            ->take(2)
                            ->get();

        return view('berita.detailberita1', compact(
            'berita',
            'page_settings',
            'beritaTerbaru'
        ));
    }

    // Menyimpan data postingan baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'nullable|string|max:50',
            'rating' => 'nullable|string|max:10',
            'link' => 'nullable|url|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Simpan file gambar jika ada
        if ($request->hasFile('foto')) {
            $validatedData['gambar'] = $request->file('foto')->store('postingans', 'public');
        }

        // Simpan data ke database
        Postingan::create($validatedData);

        return redirect()->back()->with('success', 'Postingan berhasil disimpan!');
    }
}
