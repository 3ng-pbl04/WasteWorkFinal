<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Volunteer</title>

    <!-- Tailwind CSS v4 via CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        .radio-card {
            transition: all 0.2s ease;
        }
        .radio-card:hover {
            transform: translateY(-2px);
        }
        .radio-card input:checked + label {
            border-color: #3b82f6;
            background-color: #eff6ff;
            box-shadow: 0 0 0 2px #bfdbfe;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex items-center">
                <img src="/images/LOGO.png" alt="TRASH2MOVE Logo" class="h-12 w-auto mr-3">
                <h1 class="text-xl font-bold text-gray-800">TRASH2MOVE</h1>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="md:hidden text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Navigation -->
            <nav id="mobile-menu" class="hidden md:block w-full md:w-auto">
                <ul class="flex flex-col md:flex-row items-center gap-4 md:gap-6 py-4 md:py-0">
                    <li><a href="#home" class="text-gray-700 hover:text-blue-600 transition-colors">Beranda</a></li>
                    <li><a href="#company" class="text-gray-700 hover:text-blue-600 transition-colors">Tentang Kami</a></li>
                    <li><a href="#products" class="text-gray-700 hover:text-blue-600 transition-colors">Produk</a></li>
                    <li><a href="#news" class="text-gray-700 hover:text-blue-600 transition-colors">Berita</a></li>
                    <li><a href="#testimonials" class="text-gray-700 hover:text-blue-600 transition-colors">Ulasan</a></li>
                    <li><a href="#contact" class="text-gray-700 hover:text-blue-600 transition-colors">Kontak</a></li>
                    <li><a href="#login" class="text-gray-700 hover:text-blue-600 transition-colors">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="relative bg-cover bg-center py-20 md:py-32" style="background-image: url('/images/sampah.jpg')">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-white mb-4">Ubah Sampah Menjadi Solusi</h2>
            <p class="text-lg md:text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                Misi kami adalah mendaur ulang limbah menjadi produk berkualitas tinggi yang tidak hanya ramah lingkungan tetapi juga fungsional dan estetis.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="/" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition-colors shadow-md">
                    Kembali ke Beranda
                </a>
                <a href="/pengaduan/create" class="bg-white/10 hover:bg-white/20 backdrop-blur-sm border-2 border-white text-white font-bold py-3 px-6 rounded-lg transition-colors shadow-md">
                      <i class="fas fa-hands"></i> Ajukan Aksi
                </a>
            </div>
        </div>
    </section>

    <!-- Divider -->
    <div class="border-t border-gray-200/50 my-6"></div>

    <!-- Volunteer Form Section -->
    <div class="container mx-auto px-4 py-8 md:py-12">
        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md overflow-hidden">
            <div class="bg-blue-600 text-white py-4 px-6">
                <h4 class="text-xl font-bold">Form Volunteer</h4>
                <p class="text-blue-100">Bergabunglah dengan kami untuk menciptakan perubahan!</p>
            </div>

            <div class="p-6 md:p-8">
                <form action="{{ route('volunteer.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Nama -->
                    <div class="space-y-2">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    </div>

                    <!-- No Telepon -->
                    <div class="space-y-2">
                        <label for="no_telp" class="block text-sm font-medium text-gray-700">No Telepon/WhatsApp</label>
                        <input type="tel" id="no_telp" name="no_telp" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                            placeholder="Contoh: 081234567890">
                    </div>


                    <!-- Status Kesehatan -->
                    <div class="space-y-3">
                        <legend class="block text-sm font-medium text-gray-700">Apakah Anda memiliki riwayat penyakit?</legend>

                        <div class="flex flex-col sm:flex-row gap-4">
                            <!-- Ya Option -->
                            <div class="radio-card flex-1">
                                <input type="radio" id="status_ya" name="status_kesehatan" value="ya" class="sr-only peer">
                                <label for="status_ya" class="flex flex-col items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-500 peer-checked:bg-blue-50 peer-checked:shadow-sm transition-all">
                                    <span class="text-lg font-medium text-gray-700">Ya</span>
                                    <span class="text-sm text-gray-500">Saya memiliki riwayat penyakit</span>
                                </label>
                            </div>

                            <!-- Tidak Option -->
                            <div class="radio-card flex-1">
                                <input type="radio" id="status_tidak" name="status_kesehatan" value="tidak" class="sr-only peer" checked>
                                <label for="status_tidak" class="flex flex-col items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-500 peer-checked:bg-blue-50 peer-checked:shadow-sm transition-all">
                                    <span class="text-lg font-medium text-gray-700">Tidak</span>
                                    <span class="text-sm text-gray-500">Saya tidak memiliki riwayat penyakit</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Penjelasan Penyakit (Conditional) -->
                    <div id="penjelasan-container" class="hidden space-y-2">
                        <label for="penjelasan" class="block text-sm font-medium text-gray-700">Jelaskan riwayat penyakit Anda</label>
                        <textarea id="penjelasan" name="penjelasan" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                            placeholder="Mohon jelaskan riwayat penyakit Anda secara singkat dan jelas"></textarea>
                    </div>

                    <!-- Alamat -->
                    <div class="space-y-2">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                        <textarea id="alamat" name="alamat" rows="3" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                            placeholder="Tulis alamat lengkap termasuk RT/RW, Kecamatan, dan Kota"></textarea>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition-colors shadow-md flex-1">
                            <i class="fas fa-paper-plane mr-2"></i> Kirim Data Volunteer
                        </button>
                        <button type="reset" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-3 px-6 rounded-lg transition-colors shadow-md flex-1">
                            <i class="fas fa-undo mr-2"></i> Reset Form
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-12">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <!-- About Section -->
                <div>
                    <div class="flex items-center mb-4">
                        <img src="/images/LOGO.png" alt="Trash2Move Logo" class="h-10 w-auto mr-3">
                        <h2 class="text-xl font-bold">Trash2Move</h2>
                    </div>
                    <p class="text-gray-300 mb-4">
                        Trash2Move adalah perusahaan daur ulang inovatif yang mendedikasikan diri untuk mengubah limbah menjadi produk bernilai tinggi sambil membangun komunitas yang sadar lingkungan.
                    </p>
                    <div class="flex gap-3">
                        <a href="#" class="w-9 h-9 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-9 h-9 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-9 h-9 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-9 h-9 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Products Section -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 relative pb-2 after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-12 after:h-0.5 after:bg-blue-500">
                        Produk
                    </h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition-colors">Furniture</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition-colors">Aksesori</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition-colors">Kemasan</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition-colors">Dekorasi</a></li>
                    </ul>
                </div>

                <!-- Company Section -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 relative pb-2 after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-12 after:h-0.5 after:bg-blue-500">
                        Perusahaan
                    </h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition-colors">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition-colors">Tim</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition-colors">Karir</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition-colors">Blog</a></li>
                    </ul>
                </div>

                <!-- Contact Section -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 relative pb-2 after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-12 after:h-0.5 after:bg-blue-500">
                        Kontak
                    </h3>
                    <ul class="space-y-2 text-gray-300">
                        <li class="flex items-start gap-2">
                            <i class="fas fa-map-marker-alt mt-1 text-blue-400"></i>
                            <span>Jl. Hijau Lestari No.123, Jakarta Selatan</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-phone text-blue-400"></i>
                            <span>+62 21 1234 5678</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-envelope text-blue-400"></i>
                            <span>info@trash2move.id</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-clock text-blue-400"></i>
                            <span>Senin-Jumat: 08.00-17.00</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 pt-8 text-center text-gray-400">
                &copy; 2025 Trash2Move. Hak Cipta Dilindungi.
            </div>
        </div>
    </footer>

    <script>
        // Toggle mobile menu
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Toggle penjelasan penyakit field based on radio selection
        const statusYa = document.getElementById('status_ya');
        const statusTidak = document.getElementById('status_tidak');
        const penjelasanContainer = document.getElementById('penjelasan-container');

        function togglePenjelasanField() {
            if (statusYa.checked) {
                penjelasanContainer.classList.remove('hidden');
                document.getElementById('penjelasan').required = true;
            } else {
                penjelasanContainer.classList.add('hidden');
                document.getElementById('penjelasan').required = false;
            }
        }

        statusYa.addEventListener('change', togglePenjelasanField);
        statusTidak.addEventListener('change', togglePenjelasanField);

        // Initialize based on default selection
        togglePenjelasanField();
    </script>
</body>
</html>
