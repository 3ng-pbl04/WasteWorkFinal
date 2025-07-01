<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Mail;
use App\Mail\PengaduanTerkirim;

class PengaduanController extends Controller
{
    public function create()
    {
        return view('pengaduan.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string',
            'keterangan' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'titik_koordinat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        // 2. Simpan file foto jika ada
        if ($request->hasFile('foto')) {
            // akan tersimpan di storage/app/public/pengaduan_foto
            $validatedData['foto'] = $request->file('foto')->store('pengaduan_foto', 'public');
        }

        // 3. Simpan titik koordinat jika tersedia
        if ($request->filled('latitude') && $request->filled('longitude')) {
            $validatedData['titik_koordinat'] = $request->latitude . ',' . $request->longitude;
        }

        // 4. Simpan data pengaduan dan tangkap hasilnya ke variabel
        $pengaduan = Pengaduan::create($validatedData);

        // 5. Kirim email konfirmasi
        Mail::to($validatedData['email'])->send(new PengaduanTerkirim($pengaduan));

        // 6. Redirect kembali dengan pesan sukses
        return back()->with('success', 'Pengaduan berhasil dikirim. Silakan cek email Anda.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->status = $request->status;
        $pengaduan->save();

        return back()->with('success', 'Status pengaduan berhasil diperbarui.');
    }
}
