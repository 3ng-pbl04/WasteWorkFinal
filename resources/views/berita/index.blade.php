@include('tampilan.header')

<section class="container mx-auto px-4 py-16 bg-white rounded-t-3xl shadow-2xl mb-20">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-14">
            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Semua Berita</h1>
            <p class="mt-2 text-base text-gray-600 text-balance">
                Temukan informasi terbaru seputar kegiatan & lingkungan bersama Trash2Move
            </p>
            <div class="w-24 h-1 bg-green-600 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="news-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($beritas as $berita)
                <div class="news-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                    <div class="news-image relative">
                        <img src="{{ Storage::url($berita->gambar) }}"
                             alt="{{ $berita->judul }}"
                             class="w-full h-48 object-cover">
                        <div class="news-date absolute bottom-0 left-0 bg-green-600 text-white px-3 py-1 text-sm">
                            {{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }}
                        </div>
                    </div>
                    <div class="news-content p-6">
                        <div class="news-category text-sm text-green-600 mb-2">
                            {{ $berita->admin->username }}
                        </div>
                        <h3 class="news-title text-xl font-semibold mb-3">
                            {{ $berita->judul }}
                        </h3>
                        <p class="news-excerpt text-gray-600 mb-4">
                            {{ Str::limit($berita->deskripsi, 150) }}
                        </p>

                        <a href="{{ route('berita.show', ['berita' => $berita->id]) }}"
                           class="read-more text-green-600 hover:text-green-800 font-medium transition">
                            Baca selengkapnya →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>


        <div class="mt-14 text-center">
            {{ $beritas->links() }}
        </div>
    </div>
</section>


@include('tampilan.footer')
