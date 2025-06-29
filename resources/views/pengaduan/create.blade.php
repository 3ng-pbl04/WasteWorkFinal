<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengaduan | TRASH2MOVE</title>

    <!-- Auto-refresh CSRF token script -->
    <script>
        // Refresh CSRF token setiap 30 menit
        function refreshCsrfToken() {
            fetch('/refresh-csrf')
                .then(response => response.json())
                .then(data => {
                    document.querySelectorAll('input[name="_token"]').forEach(input => {
                        input.value = data.token;
                    });
                })
                .catch(error => console.error('Error refreshing CSRF token:', error));
        }

        // Jalankan pertama kali dan set interval
        document.addEventListener('DOMContentLoaded', function() {
            refreshCsrfToken();
            setInterval(refreshCsrfToken, 1800000); // 30 menit
        });
    </script>

    <!-- Tailwind CSS v4 -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

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
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in',
                        'pulse-slow': 'pulse 3s infinite',
                    }
                }
            }
        }
    </script>

    <style>
        #map { height: 300px; }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .hero-bg {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/images/sampah.jpg');
            background-size: cover;
            background-position: center;
        }

        .dropzone {
            border: 2px dashed #d1d5db;
            transition: all 0.3s ease;
        }

        .dropzone.active {
            border-color: #22c55e;
            background-color: #f0fdf4;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">

<!-- Header -->
<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <img src="/images/LOGO.png" alt="TRASH2MOVE Logo" class="h-10 w-10">
            <span class="text-xl font-bold text-primary-700">TRASH2MOVE</span>
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-button" class="md:hidden text-gray-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Desktop Navigation -->
        <nav class="hidden md:block">
            <ul class="flex space-x-6 items-center">
                <li><a href="#" class="text-gray-600 hover:text-primary-600 transition">Beranda</a></li>
                <li><a href="#" class="text-gray-600 hover:text-primary-600 transition">Tentang Kami</a></li>
                <li><a href="#" class="text-gray-600 hover:text-primary-600 transition">Produk</a></li>
                <li><a href="#" class="text-gray-600 hover:text-primary-600 transition">Berita</a></li>
                <li><a href="#" class="text-gray-600 hover:text-primary-600 transition">Kontak</a></li>
                <li><a href="#" class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg transition">Login</a></li>
            </ul>
        </nav>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
        <div class="container mx-auto px-4 py-3 space-y-3">
            <a href="#" class="block py-2 text-gray-600 hover:text-primary-600">Beranda</a>
            <a href="#" class="block py-2 text-gray-600 hover:text-primary-600">Tentang Kami</a>
            <a href="#" class="block py-2 text-gray-600 hover:text-primary-600">Produk</a>
            <a href="#" class="block py-2 text-gray-600 hover:text-primary-600">Berita</a>
            <a href="#" class="block py-2 text-gray-600 hover:text-primary-600">Kontak</a>
            <a href="#" class="block bg-primary-600 text-white px-4 py-2 rounded-lg text-center">Login</a>
        </div>
    </div>
</header>

<!-- Hero Section -->
<section class="hero-bg min-h-[40vh] flex items-center justify-center text-white">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4">Formulir Pengaduan</h1>
        <p class="text-lg max-w-2xl mx-auto mb-6">Laporkan masalah lingkungan di sekitar Anda dan bantu kami menciptakan lingkungan yang lebih bersih dan sehat.</p>
        <div class="flex flex-wrap justify-center gap-3">
            <a href="/" class="inline-flex items-center gap-2 bg-primary-600 hover:bg-primary-700 text-white font-medium py-2 px-5 rounded-lg transition">
                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
            </a>
            <a href="{{ route('volunteer.create') }}" class="inline-flex items-center gap-2 bg-white/20 hover:bg-white/30 text-white font-medium py-2 px-5 rounded-lg transition border border-white">
                <i class="fas fa-hands-helping"></i> Jadi Volunteer
            </a>
        </div>
    </div>
</section>

<!-- Progress Steps -->
<div class="bg-white shadow-sm">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto py-6">
            <div class="flex items-center justify-between relative">
                <!-- Progress line -->
                <div class="absolute top-1/2 left-0 right-0 h-1 bg-gray-200 -translate-y-1/2 z-0"></div>

                <!-- Step 1 - Active -->
                <div class="flex flex-col items-center relative z-10">
                    <div class="w-8 h-8 rounded-full bg-primary-600 text-white flex items-center justify-center mb-2">
                        <span class="text-sm font-medium">1</span>
                    </div>
                    <span class="text-sm font-medium text-primary-600">Data Diri</span>
                </div>

                <!-- Step 2 -->
                <div class="flex flex-col items-center relative z-10">
                    <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center mb-2">
                        <span class="text-sm font-medium">2</span>
                    </div>
                    <span class="text-sm font-medium text-gray-500">Detail Pengaduan</span>
                </div>

                <!-- Step 3 -->
                <div class="flex flex-col items-center relative z-10">
                    <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center mb-2">
                        <span class="text-sm font-medium">3</span>
                    </div>
                    <span class="text-sm font-medium text-gray-500">Konfirmasi</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Form -->
<main class="container mx-auto px-4 py-8 md:py-12">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <!-- Form Header -->
            <div class="bg-primary-600 text-white px-6 py-4">
                <h2 class="text-xl font-bold flex items-center gap-3">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>Formulir Layanan Pengaduan</span>
                </h2>
                <p class="text-primary-100 text-sm mt-1">Silakan lengkapi formulir berikut dengan data yang valid</p>
            </div>

            <!-- Form Body -->
            <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-8 space-y-6">
                @csrf
                
                <!-- Backup CSRF Token -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <!-- Section 1: Personal Information -->
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-800 border-b pb-2 flex items-center gap-2">
                        <i class="fas fa-user-circle text-primary-600"></i>
                        <span>Data Pelapor</span>
                    </h3>

                    <!-- Name Field -->
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input type="text" name="nama" id="nama" required
                                   class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                   placeholder="Masukkan nama lengkap">
                        </div>
                    </div>

                    <!-- Contact Info Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Phone Field -->
                        <div>
                            <label for="no_telp" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-phone text-gray-400"></i>
                                </div>
                                <input type="tel" name="no_telp" id="no_telp" required
                                       class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                       placeholder="Contoh: 08123456789">
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input type="email" name="email" id="email" required
                                       class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                       placeholder="Contoh: email@domain.com">
                            </div>
                        </div>
                    </div>

                    <!-- Address Field -->
                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 pt-3 flex items-start pointer-events-none">
                                <i class="fas fa-map-marker-alt text-gray-400"></i>
                            </div>
                            <textarea name="alamat" id="alamat" rows="3" required
                                      class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                      placeholder="Masukkan alamat lengkap termasuk RT/RW"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Report Details -->
                <div class="space-y-6 pt-6">
                    <h3 class="text-lg font-semibold text-gray-800 border-b pb-2 flex items-center gap-2">
                        <i class="fas fa-info-circle text-primary-600"></i>
                        <span>Detail Pengaduan</span>
                    </h3>

                    <!-- Description Field -->
                    <div>
                        <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Pengaduan <span class="text-red-500">*</span></label>
                        <textarea name="keterangan" id="keterangan" rows="4" required
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                  placeholder="Jelaskan secara detail tentang masalah yang ingin dilaporkan"></textarea>
                        <p class="mt-1 text-sm text-gray-500">Minimal 50 karakter. Sertakan detail seperti jenis sampah, volume, dan dampaknya.</p>
                    </div>

                    <!-- Photo Upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Bukti Foto <span class="text-red-500">*</span></label>
                        <div id="dropzone" class="dropzone rounded-lg p-6 text-center cursor-pointer hover:border-primary-400 transition">
                            <input type="file" name="foto" id="foto" class="hidden" accept="image/*" required>
                            <div class="flex flex-col items-center justify-center space-y-3">
                                <div class="w-12 h-12 rounded-full bg-primary-100 flex items-center justify-center text-primary-600">
                                    <i class="fas fa-cloud-upload-alt text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-700">Klik untuk mengunggah atau seret file ke sini</p>
                                    <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG (Maks. 5MB)</p>
                                </div>
                            </div>
                        </div>

                        <!-- Preview Container -->
                        <div id="preview-container" class="mt-4 hidden">
                            <p class="text-sm font-medium text-gray-700 mb-2">Pratinjau Foto:</p>
                            <div class="flex flex-wrap gap-3">
                                <div id="preview-wrapper" class="relative">
                                    <img id="previewFoto" src="#" alt="Preview Foto" class="max-w-full h-40 object-cover rounded-lg border border-gray-200">
                                    <button type="button" id="remove-photo" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center hover:bg-red-600">
                                        <i class="fas fa-times text-xs"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Location Picker -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi Kejadian <span class="text-red-500">*</span></label>
                        <div class="space-y-3">
                            <div id="map" class="rounded-lg border border-gray-300"></div>
                            <div id="location-info" class="bg-gray-50 p-3 rounded-lg hidden">
                                <div class="flex items-start gap-3">
                                    <div class="flex-shrink-0 mt-0.5">
                                        <i class="fas fa-map-marker-alt text-primary-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-800">Lokasi dipilih:</p>
                                        <p id="koordinat-terpilih" class="text-sm text-gray-600"></p>
                                        <p id="address-display" class="text-sm text-gray-600 mt-1"></p>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="titik_koordinat" id="titik_koordinat">
                            <input type="hidden" name="latitude" id="latitude">
                            <input type="hidden" name="longitude" id="longitude">
                            <p class="text-xs text-gray-500">Klik pada peta untuk memilih lokasi kejadian. Geser dan zoom untuk menemukan lokasi yang tepat.</p>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="pt-6 flex flex-col-reverse sm:flex-row justify-end gap-3">
                    <button type="reset" class="px-6 py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        <i class="fas fa-undo mr-2"></i> Reset Form
                    </button>
                    <button type="submit" class="px-6 py-2.5 bg-primary-600 hover:bg-primary-700 rounded-lg text-white transition flex items-center justify-center">
                        <i class="fas fa-paper-plane mr-2"></i> Kirim Pengaduan
                    </button>
                </div>
            </form>
        </div>

        <!-- Additional Info -->
        <div class="mt-6 bg-blue-50 border border-blue-100 rounded-lg p-4">
            <div class="flex items-start gap-3">
                <div class="flex-shrink-0 text-blue-500">
                    <i class="fas fa-info-circle text-xl"></i>
                </div>
                <div>
                    <h4 class="font-medium text-blue-800">Informasi Penting</h4>
                    <p class="text-sm text-blue-700 mt-1">Pengaduan Anda akan diproses dalam waktu 1-3 hari kerja. Kami akan menghubungi Anda melalui nomor telepon atau email yang telah dicantumkan untuk verifikasi dan tindak lanjut.</p>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white pt-12 pb-6">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            <!-- About Section -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img src="/images/LOGO.png" alt="Trash2Move Logo" class="h-10 w-10">
                    <h3 class="text-xl font-bold">Trash2Move</h3>
                </div>
                <p class="text-gray-400 mb-4">Mengubah limbah menjadi produk bernilai tinggi sambil membangun komunitas yang sadar lingkungan.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-facebook-f text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-youtube text-xl"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-4 border-b border-primary-500 pb-2">Tautan Cepat</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Beranda</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Tentang Kami</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Produk</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Layanan</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Kontak</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-lg font-semibold mb-4 border-b border-primary-500 pb-2">Hubungi Kami</h4>
                <ul class="space-y-3 text-gray-400">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt mt-1 text-primary-400"></i>
                        <span>Jl. Hijau Lestari No.123, Jakarta Selatan</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-phone text-primary-400"></i>
                        <span>+62 21 1234 5678</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-envelope text-primary-400"></i>
                        <span>info@trash2move.id</span>
                    </li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h4 class="text-lg font-semibold mb-4 border-b border-primary-500 pb-2">Newsletter</h4>
                <p class="text-gray-400 mb-3">Berlangganan untuk mendapatkan informasi terbaru tentang program kami.</p>
                <form class="flex">
                    <input type="email" placeholder="Email Anda" class="px-4 py-2 rounded-l-lg focus:outline-none text-gray-800 w-full">
                    <button type="submit" class="bg-primary-600 hover:bg-primary-700 px-4 py-2 rounded-r-lg">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Copyright -->
        <div class="pt-6 border-t border-gray-700 text-center text-gray-400">
            <p>&copy; 2025 Trash2Move. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    // Initialize map
    var map = L.map('map').setView([-0.9472, 100.3544], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap',
        maxZoom: 18,
    }).addTo(map);

    // Handle map click
    var marker;
    map.on('click', function (e) {
        if (marker) {
            map.removeLayer(marker);
        }
        marker = L.marker(e.latlng).addTo(map);

        const lat = e.latlng.lat.toFixed(6);
        const lng = e.latlng.lng.toFixed(6);
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
        document.getElementById('titik_koordinat').value = `${lat}, ${lng}`;

        // Show location info box
        document.getElementById('location-info').classList.remove('hidden');
        document.getElementById('koordinat-terpilih').innerText = `Koordinat: ${lat}, ${lng}`;

        // Get location name from Nominatim (reverse geocoding)
        fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`)
            .then(response => response.json())
            .then(data => {
                const displayName = data.display_name || "Lokasi tidak ditemukan";
                document.getElementById('address-display').innerText = displayName;
            })
            .catch(error => {
                console.error('Gagal mengambil nama lokasi:', error);
                document.getElementById('address-display').innerText = "Alamat tidak tersedia";
            });
    });

    // File upload handling
    const dropzone = document.getElementById('dropzone');
    const fileInput = document.getElementById('foto');
    const previewContainer = document.getElementById('preview-container');
    const preview = document.getElementById('previewFoto');
    const removeButton = document.getElementById('remove-photo');

    // Handle click on dropzone
    dropzone.addEventListener('click', () => fileInput.click());

    // Handle file selection
    fileInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            if (file.size > 5 * 1024 * 1024) {
                alert('Ukuran file terlalu besar. Maksimal 5MB.');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.classList.remove('hidden');
                dropzone.classList.add('hidden');
            }
            reader.readAsDataURL(file);
        }
    });

    // Handle drag and drop
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropzone.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropzone.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropzone.addEventListener(eventName, unhighlight, false);
    });

    function highlight() {
        dropzone.classList.add('active');
    }

    function unhighlight() {
        dropzone.classList.remove('active');
    }

    dropzone.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        fileInput.files = files;

        const event = new Event('change');
        fileInput.dispatchEvent(event);
    }

    // Remove photo
    removeButton.addEventListener('click', function() {
        fileInput.value = '';
        preview.src = '#';
        previewContainer.classList.add('hidden');
        dropzone.classList.remove('hidden');
    });

    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>

<script>
    fetch('/api/pengaduan-maps')
        .then(response => response.json())
        .then(data => {
            data.forEach(item => {
                L.marker([item.latitude, item.longitude])
                    .addTo(map)
                    .bindPopup(`<strong>${item.nama}</strong><br>${item.keterangan}<br><img src="/storage/${item.foto}" width="100">`);
            });
        })
        .catch(error => console.error('Error loading data:', error));
</script>

</body>
</html>