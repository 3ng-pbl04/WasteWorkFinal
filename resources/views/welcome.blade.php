<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trash 2 Move - Solusi Daur Ulang untuk Masa Depan Lebih Hijau</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/LOGO.png') }}" type="image/png">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <style>
        /* Custom styles that complement Tailwind */
        .hero {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .testimonial-carousel .swiper-slide {
            height: auto;
        }

        .mitra-logo {
            transition: all 0.3s ease;
        }

        .mitra-logo:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .news-card {
            transition: transform 0.3s ease;
        }

        .news-card:hover {
            transform: translateY(-5px);
        }

        /* Hamburger menu styles */
        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .mobile-menu.open {
            max-height: 500px;
        }

        /* Animation for stats */
        @keyframes countUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .stat-item {
            animation: countUp 0.6s ease-out forwards;
        }
    </style>
</head>

<body class="font-sans antialiased text-gray-800">
    <!-- Header & Navigation -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="logo flex items-center">
                <img src="{{ asset('storage/' . $page_settings->company_logo) }}"
                     alt="Logo"
                     class="h-10 w-10 object-contain mr-3">
                <h1 class="text-xl font-bold text-green-700">{{ $page_settings->company_name ?? 'Trash2Move' }}</h1>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:block">
                <ul class="flex space-x-6">
                    <li><a href="#home" class="hover:text-green-600 transition">Beranda</a></li>
                    <li><a href="#company" class="hover:text-green-600 transition">Tentang Kami</a></li>
                    <li><a href="#products" class="hover:text-green-600 transition">Produk</a></li>
                    <li><a href="#news" class="hover:text-green-600 transition">Berita</a></li>
                    <li><a href="#testimonials" class="hover:text-green-600 transition">Ulasan</a></li>
                    <li><a href="#contact" class="hover:text-green-600 transition">Kontak</a></li>
                    <li><a href="{{ route('login') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Login</a></li>
                </ul>
            </nav>

            <!-- Mobile Hamburger Menu -->
            <button id="mobile-menu-button" class="md:hidden text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="mobile-menu md:hidden bg-white">
            <ul class="px-4 py-2 space-y-2">
                <li><a href="#home" class="block py-2 hover:text-green-600">Beranda</a></li>
                <li><a href="#company" class="block py-2 hover:text-green-600">Tentang Kami</a></li>
                <li><a href="#products" class="block py-2 hover:text-green-600">Produk</a></li>
                <li><a href="#news" class="block py-2 hover:text-green-600">Berita</a></li>
                <li><a href="#testimonials" class="block py-2 hover:text-green-600">Ulasan</a></li>
                <li><a href="#contact" class="block py-2 hover:text-green-600">Kontak</a></li>
                <li><a href="{{ route('login') }}" class="block bg-green-600 text-white px-4 py-2 rounded text-center hover:bg-green-700">Login</a></li>
            </ul>
        </div>
    </header>

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
                    <div class="stat-number text-3xl font-bold text-green-600 mb-2">15,000+</div>
                    <div class="stat-label text-gray-600">Ton Sampah Didaur Ulang</div>
                </div>
                <div class="stat-item bg-white p-6 rounded-lg shadow-md">
                    <div class="stat-number text-3xl font-bold text-green-600 mb-2">500+</div>
                    <div class="stat-label text-gray-600">Produk Inovatif</div>
                </div>
                <div class="stat-item bg-white p-6 rounded-lg shadow-md">
                    <div class="stat-number text-3xl font-bold text-green-600 mb-2">250+</div>
                    <div class="stat-label text-gray-600">Komunitas Terlibat</div>
                </div>
                <div class="stat-item bg-white p-6 rounded-lg shadow-md">
                    <div class="stat-number text-3xl font-bold text-green-600 mb-2">10,000+</div>
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
            <button class="filter-btn bg-green-600 text-white px-4 py-2 rounded-full">Semua</button>
            <button class="filter-btn bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-full transition">Furniture</button>
            <button class="filter-btn bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-full transition">Aksesori</button>
            <button class="filter-btn bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-full transition">Kemasan</button>
        </div>

       <div class="product-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach ($postingans as $post)
    <div class="product-card bg-white rounded-lg shadow-md hover:shadow-xl transition transform hover:scale-[1.02] duration-300 flex flex-col min-h-[500px]">
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
                        <div class="news-category text-sm text-green-600 mb-2">{{ $berita->admin->username }}</div>
                        <h3 class="news-title text-xl font-semibold mb-3">{{ $berita->judul }}</h3>
                        <p class="news-excerpt text-gray-600 mb-4">{{ Str::limit($berita->deskripsi, 150) }}</p>

                        @if ($berita->slug)
                            <a href="{{ route('berita.detail', ['slug' => $berita->slug]) }}"
                               class="read-more text-green-600 hover:text-green-800 font-medium transition">
                                Baca selengkapnya →
                            </a>
                        @else
                            <a href="{{ route('berita.detail1', ['id' => $berita->id]) }}"
                               class="read-more text-green-600 hover:text-green-800 font-medium transition">
                                Baca selengkapnya →
                            </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

            <div class="see-all-news text-center mt-12">
                <a href="#" class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition">
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

    <!-- Footer -->
    <footer class="bg-gray-800 text-white pt-12 pb-6">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-10">
            {{-- Kolom 1: Logo dan Deskripsi --}}
            <div class="space-y-4">
                <div class="flex items-center">
                    <img src="{{ asset('images/LOGO.png') }}" alt="Logo" class="h-10 w-10 mr-3">
                    <h2 class="text-xl font-bold">Trash2Move</h2>
                </div>
                <p class="text-gray-400">
                    {{ $page_settings->footer_text ?? 'Solusi daur ulang untuk masa depan yang lebih hijau dan berkelanjutan.' }}
                </p>
                <div class="flex space-x-4 mt-2">
                    @if ($page_settings->facebook_link)
                        <a href="{{ $page_settings->facebook_link }}" class="text-[#3b5998] hover:text-white transition" target="_blank" aria-label="Facebook">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                    @endif
                    @if ($page_settings->instagram_link)
                        <a href="{{ $page_settings->instagram_link }}" class="text-[#E1306C] hover:text-white transition" target="_blank" aria-label="Instagram">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                    @endif
                    @if ($page_settings->twitter_link)
                        <a href="{{ $page_settings->twitter_link }}" class="text-[#1DA1F2] hover:text-white transition" target="_blank" aria-label="Twitter">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                    @endif
                    @if ($page_settings->youtube_link)
                        <a href="{{ $page_settings->youtube_link }}" class="text-[#FF0000] hover:text-white transition" target="_blank" aria-label="YouTube">
                            <i class="fab fa-youtube text-xl"></i>
                        </a>
                    @endif
                    @if ($page_settings->tiktok_link)
                        <a href="{{ $page_settings->tiktok_link }}" class="text-[#010101] hover:text-white transition" target="_blank" aria-label="TikTok">
                            <i class="fab fa-tiktok text-xl"></i>
                        </a>
                    @endif
                </div>
            </div>

          {{-- Kolom 2: Produk --}}
        <div class="flex flex-col min-w-[160px]">
            <h3 class="text-lg font-semibold mb-4">Produk</h3>
            <ul class="space-y-2 text-gray-400">
                <li><a href="#" class="hover:text-white transition">Furniture</a></li>
                <li><a href="#" class="hover:text-white transition">Aksesori</a></li>
                <li><a href="#" class="hover:text-white transition">Kemasan</a></li>
                <li><a href="#" class="hover:text-white transition">Dekorasi</a></li>
            </ul>
        </div>

        {{-- Kolom 3: Perusahaan --}}
        <div class="flex flex-col min-w-[160px]">
            <h3 class="text-lg font-semibold mb-4">Perusahaan</h3>
            <ul class="space-y-2 text-gray-400">
                <li><a href="#" class="hover:text-white transition">Tentang Kami</a></li>
                <li><a href="#" class="hover:text-white transition">Tim</a></li>
                <li><a href="#" class="hover:text-white transition">Karir</a></li>
                <li><a href="#" class="hover:text-white transition">Blog</a></li>
            </ul>
        </div>

            {{-- Kolom 4: Kontak --}}
            <div>
            <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                <ul class="space-y-2 text-gray-400">
                    <li>
                        {!! nl2br(e($page_settings->alamat ?? 'Informasi kontak belum tersedia')) !!}
                    </li>
                </ul>
        </div>

        </div>

        <div class="text-center text-sm text-gray-400 border-t border-gray-700 pt-6">
            &copy; 2025 Zikry. Hak Cipta Dilindungi.
        </div>
    </div>
</footer>


    <!-- Modal - Volunteer Form -->
    <div id="volunteer-modal" class="modal fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-2xl font-bold text-gray-900">Daftar Sebagai Volunteer</h3>
                        <button onclick="closeModal('volunteer-modal')" class="text-gray-500 hover:text-gray-700">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <form id="volunteer-form">
                        <div class="mb-4">
                            <label for="volunteer-name" class="block text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" id="volunteer-name"
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" required>
                        </div>
                        <div class="mb-4">
                            <label for="volunteer-email" class="block text-gray-700 mb-2">Email</label>
                            <input type="email" id="volunteer-email"
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" required>
                        </div>
                        <div class="mb-4">
                            <label for="volunteer-phone" class="block text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="tel" id="volunteer-phone"
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" required>
                        </div>
                        <div class="mb-4">
                            <label for="volunteer-availability" class="block text-gray-700 mb-2">Ketersediaan Waktu</label>
                            <select id="volunteer-availability"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" required>
                                <option value="">Pilih ketersediaan</option>
                                <option value="weekday">Hari Kerja</option>
                                <option value="weekend">Akhir Pekan</option>
                                <option value="both">Keduanya</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="volunteer-skills" class="block text-gray-700 mb-2">Keahlian & Pengalaman</label>
                            <textarea id="volunteer-skills" rows="3"
                                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"
                                      placeholder="Ceritakan tentang keahlian dan pengalaman yang relevan..."></textarea>
                        </div>
                        <div class="mb-6">
                            <label for="volunteer-motivation" class="block text-gray-700 mb-2">Motivasi</label>
                            <textarea id="volunteer-motivation" rows="3"
                                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"
                                      placeholder="Mengapa Anda tertarik menjadi volunteer EcoRecycle?"></textarea>
                        </div>
                        <button type="submit"
                                class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg transition">
                            Kirim Aplikasi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal - Location Form -->
    <div id="location-modal" class="modal fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-2xl font-bold text-gray-900">Ajukan Lokasi Aksi</h3>
                        <button onclick="closeModal('location-modal')" class="text-gray-500 hover:text-gray-700">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <!-- Form content would go here -->
                    <p class="text-gray-600 mb-4">Formulir pengajuan lokasi aksi akan ditampilkan di sini.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('open');
        });

        // Initialize Swiper for testimonials
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.testimonial-carousel', {
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                slidesPerView: 1,
                spaceBetween: 20,
                autoplay: {
                    delay: 5000,
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    }
                }
            });

            // Initialize Swiper for mitra
            new Swiper('.mitra-swiper', {
                slidesPerView: 'auto',
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 0,
                    disableOnInteraction: false
                },
                speed: 5000,
                grabCursor: true,
                breakpoints: {
                    320: {
                        spaceBetween: 20,
                        speed: 4000
                    },
                    768: {
                        spaceBetween: 30,
                        speed: 4500
                    },
                    1024: {
                        spaceBetween: 40,
                        speed: 5000
                    }
                }
            });
        });

        // Modal functions
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
