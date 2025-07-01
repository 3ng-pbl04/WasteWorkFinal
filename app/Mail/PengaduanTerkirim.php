<?php
namespace App\Mail;
use App\Models\Pengaduan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class PengaduanTerkirim extends Mailable {
    use Queueable, SerializesModels;
    public Pengaduan $pengaduan;
    public function __construct(Pengaduan $pengaduan) {
         $this->pengaduan = $pengaduan; }
         public function build() {
             return $this
             ->subject('Terima Kasih Telah Mengirimkan Pengaduan')
             ->markdown('emails.pengaduan.terkirim'); } }
