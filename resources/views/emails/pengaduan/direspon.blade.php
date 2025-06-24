@component('mail::message')

Halo {{ $pengaduan->nama }}
Kami menginformasikan bahwa pengaduan Anda telah berhasil kami proses. Saat ini, laporan Anda berada dalam status

@component('mail::panel')
Status Pengaduan: {{ $pengaduan->status }}

@if($pengaduan->catatan_admin)
Catatan: {{ $pengaduan->catatan_admin }}
@endif
@endcomponent

Terima kasih atas perhatian dan kepercayaan Anda terhadap layanan kami. 
Dukungan Anda menunjukkan kepedulian nyata terhadap lingkungan yang lebih bersih dan berkelanjutan.
Mari terus bergerak bersama demi bumi yang lebih lestari.

@component('mail::button', ['url' => url('/')])
Kembali ke Website
@endcomponent

Salam,
Tim Trash2Move
@endcomponent