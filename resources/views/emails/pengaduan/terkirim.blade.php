@component('mail::message') 
# Halo {{ $pengaduan->nama }} 
Terima kasih telah mengirimkan pengaduan Anda kepada Trash2Move. 
Kami telah menerima laporan Anda dengan keterangan: 
@component('mail::panel') {{ $pengaduan->keterangan }} 
@endcomponent Kami akan segera memproses laporan Anda. 
Mohon bersabar dan pantau email ini untuk informasi selanjutnya. 
@component('mail::button', ['url' => url('/')]) Kembali ke Website 
@endcomponent Terima kasih,<br> Tim Trash2Move 
@endcomponent