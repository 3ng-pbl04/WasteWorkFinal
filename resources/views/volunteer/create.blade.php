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
            .hero-bg {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/images/sampah.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">

@include('tampilan.header')


    <!-- Hero Section -->
   <section class="hero-bg min-h-[40vh] flex items-center justify-center text-white">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4">Formulir Pengaduan</h1>
        <p class="text-lg max-w-2xl mx-auto mb-6">Laporkan masalah lingkungan di sekitar Anda dan bantu kami menciptakan lingkungan yang lebih bersih dan sehat.</p>
        <div class="flex flex-wrap justify-center gap-3">
            <a href="/" class="inline-flex items-center gap-2 bg-primary-600 hover:bg-primary-700 text-white font-medium py-2 px-5 rounded-lg transition">
                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
            </a>
            <a href="{{ route('pengaduan.create') }}" class="inline-flex items-center gap-2 bg-white/20 hover:bg-white/30 text-white font-medium py-2 px-5 rounded-lg transition border border-white">
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
    @include('tampilan.footer')

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
