<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Berita | {{ $page_settings->company_name ?? 'Trash2Move' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui']
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        .prose :where(img):not(:where([class~="not-prose"] *)) {
            margin-top: 0;
            margin-bottom: 0;
        }

        .article-content p {
            margin-bottom: 1.25em;
        }

        .gradient-text {
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            background-image: linear-gradient(to right, #16a34a, #22c55e);
        }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">

    <!-- Header -->
    @include('tampilan.header')


    <div class="bg-gray-100 min-h-screen pt-6">
    <!-- Main Content -->
    <main class="container mx-auto px-4 py-12 bg-white rounded-t-3xl shadow-xl mb-20">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Article Content -->
            <article class="lg:w-2/3">
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <!-- Featured Image -->
                    <div class="relative overflow-hidden h-80 md:h-96">
                        <img src="{{ asset('storage/' . $berita->gambar) }}"
                             alt="{{ $berita->judul }}"
                             class="w-full h-full object-cover transition duration-500 hover:scale-105">
                    </div>

                    <!-- Article Header -->
                    <div class="p-6 md:p-8">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                            <div class="flex items-center space-x-2 text-sm text-gray-500 mb-3 md:mb-0">
                                <span class="flex items-center">
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                                </span>
                                <span>•</span>
                                <span class="flex items-center">
                                    <i class="far fa-user mr-1"></i>
                                    @if ($berita->admin && isset($berita->admin->username))
                                        Diposting oleh: {{ $berita->admin->username }}
                                    @else
                                        Admin
                                    @endif
                                </span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="text-sm text-gray-500">Bagikan:</span>
                                <div class="flex space-x-2">
                                    <a href="#" class="w-8 h-8 rounded-full bg-gray-100 hover:bg-primary-100 text-gray-600 hover:text-primary-600 flex items-center justify-center transition">
                                        <i class="fab fa-facebook-f text-sm"></i>
                                    </a>
                                    <a href="#" class="w-8 h-8 rounded-full bg-gray-100 hover:bg-primary-100 text-gray-600 hover:text-primary-600 flex items-center justify-center transition">
                                        <i class="fab fa-twitter text-sm"></i>
                                    </a>
                                    <a href="#" class="w-8 h-8 rounded-full bg-gray-100 hover:bg-primary-100 text-gray-600 hover:text-primary-600 flex items-center justify-center transition">
                                        <i class="fab fa-instagram text-sm"></i>
                                    </a>
                                    <a href="#" class="w-8 h-8 rounded-full bg-gray-100 hover:bg-primary-100 text-gray-600 hover:text-primary-600 flex items-center justify-center transition">
                                        <i class="fab fa-whatsapp text-sm"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Article Title -->
                        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-800 mb-6 leading-tight">
                            {{ $berita->judul }}
                        </h1>

                        <!-- Article Content -->
                        <div class="prose max-w-none article-content text-gray-700">
                            <p class="text-lg leading-relaxed">{{ $berita->deskripsi }}</p>

                            @if (!empty($berita->subjudul))
                                <h2 class="text-xl md:text-2xl font-semibold text-gray-800 mt-8 mb-4">{{ $berita->subjudul }}</h2>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Comments Section -->
                <div class="mt-12 bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-6 md:p-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                            <i class="far fa-comments mr-2 text-primary-600"></i>
                            Tambahkan Komentar Anda
                        </h3>

                        <form id="comment-form" method="POST" action="{{ route('ulasan.store') }}" class="space-y-4">
                            @csrf
                            <div>
                                <label for="comment-name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                                <input type="text" id="comment-name" name="nama"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition"
                                    placeholder="Masukkan nama Anda" required>
                            </div>

                            <div>
                                <label for="comment-role" class="block text-sm font-medium text-gray-700 mb-1">Peran</label>
                                <input type="text" id="comment-role" name="peran"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition"
                                    placeholder="Masukkan peran Anda (misalnya, Pelanggan, Volunteer, dll.)" required>
                            </div>

                            <div>
                                <label for="comment-text" class="block text-sm font-medium text-gray-700 mb-1">Komentar</label>
                                <textarea id="comment-text" name="deskripsi" rows="4"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition"
                                    placeholder="Tulis komentar Anda di sini..." required></textarea>
                            </div>

                            <button type="submit"
                                class="px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition duration-300">
                                Kirim Komentar
                            </button>
                        </form>
                    </div>
                </div>
            </article>

            <!-- Sidebar -->
            <aside class="lg:w-1/3 space-y-6">
                <!-- About Widget -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-6 md:p-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-info-circle mr-2 text-primary-600"></i>
                            Tentang Kami
                        </h3>
                        <p class="text-gray-600 mb-4">
                            {{ $page_settings->company_description ?? 'Trash2Move adalah perusahaan daur ulang inovatif yang mendedikasikan diri untuk mengubah limbah menjadi produk bernilai tinggi.' }}
                        </p>
                        <a href="#company" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium">
                            Selengkapnya
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Recent News Widget -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-6 md:p-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="far fa-newspaper mr-2 text-primary-600"></i>
                            Berita Terbaru
                        </h3>
                        <div class="space-y-4">
                            @forelse($beritaTerbaru as $news)
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0 w-20 h-16 overflow-hidden rounded-lg">
                                        <img src="{{ asset('storage/' . $news->gambar) }}"
                                            alt="{{ $news->judul }}"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-semibold text-gray-800 hover:text-primary-600 transition">
                                            <a href="{{ route('berita.show', $news->id) }}">{{ $news->judul }}</a>
                                        </h4>
                                        <p class="text-xs text-gray-500">
                                            {{ \Carbon\Carbon::parse($news->tanggal)->translatedFormat('d F Y') }}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-sm text-gray-500">Tidak ada berita terbaru</p>
                            @endforelse
                        </div>

                        @if($beritaTerbaru->count() > 0)
                            <div class="mt-4 text-right">
                                <a href="{{ route('berita.index') }}" class="text-sm text-primary-600 hover:text-primary-700 font-medium">
                                    Lihat Semua Berita <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- info Widget -->
               <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-6 md:p-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-chart-line mr-2 text-primary-600"></i>
                        Dampak Kami
                    </h3>
                    <div class="grid grid-cols-2 gap-4 text-center">
                        <div class="bg-primary-50 p-4 rounded-lg">
                            <div class="text-3xl font-bold text-primary-600">{{ $jumlahSampah }}</div>
                            <div class="text-sm text-gray-600 mt-1">Sampah Didaur Ulang</div>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg">
                            <div class="text-3xl font-bold text-green-600">{{ number_format($jumlahProduk) }}+</div>
                            <div class="text-sm text-gray-600 mt-1">Produk Inovatif</div>
                        </div>
                        <div class="bg-yellow-50 p-4 rounded-lg">
                            <div class="text-3xl font-bold text-yellow-600">{{ number_format($jumlahKomunitas) }}+</div>
                            <div class="text-sm text-gray-600 mt-1">Komunitas Terlibat</div>
                        </div>
                        <div class="bg-purple-50 p-4 rounded-lg">
                            <div class="text-3xl font-bold text-purple-600">{{ number_format($jumlahKomunitas) }}+</div>
                            <div class="text-sm text-gray-600 mt-1">Pohon Ditanam</div>
                        </div>
                    </div>
                </div>
            </div>

            </aside>
        </div>
    </main>
</div>


    <!-- Footer -->
    @include('tampilan.footer')

    <!-- Back to Top Button -->
    <button id="back-to-top" class="fixed bottom-6 right-6 w-12 h-12 rounded-full bg-primary-600 text-white shadow-lg flex items-center justify-center opacity-0 invisible transition-all duration-300">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Back to Top Button
        const backToTopButton = document.getElementById('back-to-top');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('opacity-0', 'invisible');
                backToTopButton.classList.add('opacity-100', 'visible');
            } else {
                backToTopButton.classList.remove('opacity-100', 'visible');
                backToTopButton.classList.add('opacity-0', 'invisible');
            }
        });

        backToTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>
</html>
