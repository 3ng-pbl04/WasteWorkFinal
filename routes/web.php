<?php

use App\Exports\BahanBakuExport;
use App\Exports\HasilOlahExport;
use App\Exports\SampahExport;


use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PageSettingController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UlasanController;

use App\Http\Controllers\VolunteerController;
use App\Models\BahanBaku;
use App\Models\HasilOlah;

use App\Models\Sampah;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;



Route::resource('pengaduan', PengaduanController::class);
Route::resource('volunteer', VolunteerController::class);
Route::resource('ulasan', UlasanController::class);
//Route::post('/', [UlasanController::class, 'store'])->name('ulasan.store');

//  Beranda via Controller
Route::get('/', [PostinganController::class, 'index'])->name('welcome');

Route::prefix('berita')->group(function () {
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index'); // Halaman semua berita
    Route::get('/{berita}', [BeritaController::class, 'show'])->name('berita.show'); // Detail berita berdasarkan ID
});

//  Export Excel & PDF
Route::get('/export-sampah', fn() => Excel::download(new SampahExport, 'data-sampah.xlsx'))->name('export.sampah');

Route::get('/export-sampah-pdf', function () {
    $sampahs = Sampah::all();
    $pdf = Pdf::loadView('exports.sampah-pdf', compact('sampahs'));
    return $pdf->download('data-sampah.pdf');
})->name('export.sampah.pdf');

Route::get('/export-bahan-baku-excel', fn() => Excel::download(new BahanBakuExport, 'bahan-baku.xlsx'))->name('export.bahan.excel');

Route::get('/export-bahan-baku-pdf', function () {
    $bahans = BahanBaku::all();
    $pdf = Pdf::loadView('exports.bahan-baku-pdf', compact('bahans'));
    return $pdf->download('bahan-baku.pdf');
})->name('export.bahan.pdf');

Route::get('/export-hasil-olah-excel', fn() => Excel::download(new HasilOlahExport, 'hasil-olah.xlsx'))->name('export.hasilolah.excel');

Route::get('/export-hasil-olah-pdf', function () {
    $hasils = HasilOlah::all();
    $pdf = Pdf::loadView('exports.export-hasilolah', compact('hasils'));
    return $pdf->download('hasil-olah.pdf');
})->name('export.hasilolah.pdf');


Route::put('/pengaduan/{id}/update-status', [PengaduanController::class, 'updateStatus'])->name('pengaduan.updateStatus');


//  Halaman login
Route::get('/login', fn() => view('login'))->name('login');

// Route::get('/', function () {
//     return view('welcome')->with('success', Session::get('success'));
// });
