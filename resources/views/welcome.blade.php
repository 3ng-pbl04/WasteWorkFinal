@include('tampilan.header')


    <!-- Hero Section -->
    <section id="home" class="hero min-h-[70vh] flex items-center justify-center text-white relative"
        style="background-image: url('{{ $page_settings->hero_image ? asset('storage/' . $page_settings->hero_image) : asset('images/sampah.jpg') }}')">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">{{ $page_settings->hero_title ?? 'Selamat Datang di Trash2Move' }}</h2>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">{{ $page_settings->hero_description ?? 'Solusi daur ulang untuk masa depan yang lebih hijau' }}</p>

            <div class="cta-buttons flex flex-col sm:flex-row justify-center gap-4">
                <a href="/pengaduan/create" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                    Ajukan Lokasi Aksi
                </a>
                <a href="/volunteer/create" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                    Jadi Volunteer
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div class="stat-item bg-white p-6 rounded-lg shadow-md">
                <div class="stat-number text-3xl font-bold text-green-600 mb-2">
                    {{ $jumlahSampah }}
                </div>
                <div class="stat-label text-gray-600">Sampah Didaur Ulang</div>
            </div>
            <div class="stat-item bg-white p-6 rounded-lg shadow-md">
                <div class="stat-number text-3xl font-bold text-green-600 mb-2">
                    {{ number_format($jumlahProduk) }}+
                </div>
                <div class="stat-label text-gray-600">Produk Inovatif</div>
            </div>
            <div class="stat-item bg-white p-6 rounded-lg shadow-md">
                <div class="stat-number text-3xl font-bold text-green-600 mb-2">
                    {{ number_format($jumlahKomunitas) }}+
                </div>
                <div class="stat-label text-gray-600">Komunitas Terlibat</div>
            </div>
            <div class="stat-item bg-white p-6 rounded-lg shadow-md">
                <div class="stat-number text-3xl font-bold text-green-600 mb-2">
                    {{ number_format($jumlahKomunitas) }}+
                </div>
                <div class="stat-label text-gray-600">Pohon Ditanam</div>
            </div>
        </div>
    </div>
</section>


    <!-- Company Profile Section -->
    <section id="company" class="company-profile py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="section-title text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">{{ $page_settings->about_title ?? 'Tentang Kami' }}</h2>
                <div class="w-20 h-1 bg-green-600 mx-auto mt-4"></div>
            </div>

            <div class="flex flex-col lg:flex-row gap-8 items-center">
                <div class="about-image lg:w-1/2">
                    <img src="{{ $page_settings->about_image ? asset('storage/' . $page_settings->about_image) : asset('images/team.jpg') }}"
                         alt="Tentang Kami"
                         class="w-full rounded-lg shadow-lg">
                </div>
                <div class="about-content lg:w-1/2">
                    <h3 class="text-2xl font-semibold text-green-700 mb-3">Visi</h3>
                    <div class="text-gray-700 mb-6">
                        {!! $page_settings->visi ?? '<p>Tidak ada visi yang tersedia.</p>' !!}
                    </div>

                    <h3 class="text-2xl font-semibold text-green-700 mb-3">Misi</h3>
                    <div class="text-gray-700 mb-6">
                        {!! $page_settings->misi ?? '<p>Tidak ada misi yang tersedia.</p>' !!}
                    </div>

                    <h3 class="text-2xl font-semibold text-green-700 mb-3">Kenapa Kami?</h3>
                    <div class="text-gray-700">
                        {!! $page_settings->keunggulan ?? '<p>Tidak ada keunggulan yang tersedia.</p>' !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Section -->
    <section id="products" class="products py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="section-title text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Produk Kami</h2>
            <div class="w-20 h-1 bg-green-600 mx-auto mt-4"></div>
        </div>

        <div class="product-filters flex flex-wrap justify-center gap-3 mb-8">
            <button class="filter-btn bg-green-600 text-white px-4 py-2 rounded-full" data-filter="semua">Semua</button>
            <button class="filter-btn bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-full transition" data-filter="kursi">Kursi</button>
            <button class="filter-btn bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-full transition" data-filter="ganci">Ganci</button>
        </div>

      <div class="product-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach ($postingans as $post)
    <div class="product-card bg-white rounded-lg shadow-md hover:shadow-xl transition transform hover:scale-[1.02] duration-300 flex flex-col min-h-[500px]"
         data-kategori="{{ strtolower($post->kategori) }}">

        {{-- Gambar --}}
        <div class="product-image h-48 overflow-hidden">
            <img src="{{ Storage::url($post->gambar) }}"
                 alt="{{ $post->judul }}"
                 class="w-full h-full object-cover">
        </div>

        {{-- Info Produk --}}
        <div class="flex flex-col justify-between flex-grow p-6">
            <div>
                <h3 class="text-xl font-semibold mb-2">{{ $post->nama }}</h3>
                <p class="text-gray-600 mb-4">{{ $post->deskripsi }}</p>
            </div>

            {{-- Harga & Rating --}}
            <div class="flex justify-between items-center mt-auto pt-4">
                <span class="font-bold text-green-600">
                    Rp {{ number_format($post->harga, 0, ',', '.') }}
                </span>
                <span class="text-yellow-400">
                    {!! render_stars($post->rating) !!}
                </span>
            </div>
        </div>

        {{-- Tombol Beli --}}
        <div class="px-6 pb-6">
            <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded transition"
                    onclick="window.open('{{ $post->link }}', '_blank');">
                Beli
            </button>
        </div>
    </div>
    @endforeach
</div>


    </div>
</section>


    <!-- Mitra Section -->
   <section id="mitra" class="mitra py-16 bg-white relative overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="section-title text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Mitra Kami</h2>
            <div class="w-20 h-1 bg-green-600 mx-auto mt-4 mb-3"></div>
            <p class="text-gray-600">Dipercaya oleh perusahaan terkemuka</p>
        </div>

        <div class="swiper mitra-swiper px-4">
            <div class="swiper-wrapper py-8">
                @foreach($mitras as $mitra)
                <div class="swiper-slide">
                    <div class="mitra-logo bg-white rounded-full overflow-hidden shadow-md h-32 w-32 mx-auto">
                        <img src="{{ $mitra->logo_mitra ? asset('storage/' . $mitra->logo_mitra) : 'https://via.placeholder.com/95x95/cccccc/FFFFFF?text=Logo' }}"
                             alt="{{ $mitra->nama }}"
                             class="w-full h-full object-cover rounded-full">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


    <!-- News Section -->
   <section id="news" class="news py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="section-title text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Berita Terkini</h2>
            <div class="w-20 h-1 bg-green-600 mx-auto mt-4"></div>
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

        <div class="see-all-news text-center mt-12">
            <a href="{{ route('berita.index') }}"
               class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="section-title text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Ulasan Pelanggan</h2>
                <div class="w-20 h-1 bg-green-600 mx-auto mt-4"></div>
            </div>

            <div class="swiper testimonial-carousel mb-16 px-4">
                <div class="swiper-wrapper pb-12">
                    @foreach($ulasans->take(5) as $ulasan)
                    <div class="swiper-slide">
                        <div class="testimonial-item bg-gray-50 p-8 rounded-lg h-full">
                            <p class="testimonial-text text-gray-700 italic mb-6">"{{ $ulasan->deskripsi }}"</p>
                            <p class="testimonial-author font-semibold">{{ $ulasan->nama }}</p>
                            <p class="testimonial-role text-gray-600 text-sm">{{ $ulasan->pekerjaan ?? 'Pelanggan' }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Navigation buttons -->
                <div class="swiper-button-next text-green-600"></div>
                <div class="swiper-button-prev text-green-600"></div>
            </div>

            <!-- Add Comment Section -->
            <div class="add-comment mt-8 max-w-2xl mx-auto">
                <h3 class="text-2xl font-semibold text-center mb-6">Tambahkan Komentar Anda</h3>
                <form method="POST" id="comment-form" action="{{ route('ulasan.store') }}" class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="comment-name" class="block text-gray-700 mb-2">Nama</label>
                        <input type="text" name="nama" id="comment-name"
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"
                               placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="comment-role" class="block text-gray-700 mb-2">Peran</label>
                        <input type="text" name="peran" id="comment-role"
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"
                               placeholder="Masukkan peran Anda (misalnya, Pelanggan, Volunteer, dll.)" required>
                    </div>
                    <div class="form-group mb-6">
                        <label for="comment-text" class="block text-gray-700 mb-2">Komentar</label>
                        <textarea name="komentar" id="comment-text" rows="4"
                                  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"
                                  placeholder="Tulis komentar Anda di sini..." required></textarea>
                    </div>
                    <button type="submit"
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg transition">
                        Kirim Komentar
                    </button>
                </form>

                @if (session('success'))
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: '{{ session('success') }}',
                        });
                    </script>
                @endif
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section py-16 bg-green-700 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Bergabunglah Dengan Gerakan Daur Ulang</h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">Bersama kita bisa menciptakan masa depan yang lebih berkelanjutan. Daftarkan diri Anda sebagai volunteer atau ajukan lokasi daur ulang hari ini!</p>
            <div class="cta-buttons flex flex-col sm:flex-row justify-center gap-4">
                <button class="btn-white bg-white text-green-700 hover:bg-gray-100 font-bold py-3 px-6 rounded-lg transition">
                    Ajukan Lokasi Aksi
                </button>
                <button class="btn-white bg-transparent border-2 border-white hover:bg-white hover:text-green-700 font-bold py-3 px-6 rounded-lg transition">
                    Jadi Volunteer
                </button>
            </div>
        </div>
    </section>

 @include('tampilan.footer')
