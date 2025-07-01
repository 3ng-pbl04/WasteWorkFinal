<!-- Footer -->
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

<footer class="bg-gray-800 text-white pt-12 pb-6">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            <!-- About Section -->
            <div>
                <div class="flex items-center gap-3 mb-4">
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

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-4 border-b border-primary-500 pb-2">Tautan Cepat</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Beranda</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Tentang Kami</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Produk</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Layanan</a></li>
                </ul>
            </div>

              <!-- Produk -->
            <div>
                <h4 class="text-lg font-semibold mb-4 border-b border-primary-500 pb-2">Produk</h4>
                    <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Furniture</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Aksesoris</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Kemasan</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Dekorasi</a></li>
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


        </div>

        <!-- Copyright -->
        <div class="pt-6 border-t border-gray-700 text-center text-gray-400">
            <p>&copy; 2025 WasteWork . Inovasi untuk masa depan berkelanjutan</p>
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

<script>
    document.querySelectorAll('.filter-btn').forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.getAttribute('data-filter');
            const cards = document.querySelectorAll('.product-card');

            cards.forEach(card => {
                const kategori = card.getAttribute('data-kategori');

                if (filter === 'semua' || kategori === filter) {
                    card.classList.remove('opacity-0', 'scale-95');
                    card.classList.add('opacity-100', 'scale-100');
                    card.style.display = 'flex';
                } else {
                    card.classList.remove('opacity-100', 'scale-100');
                    card.classList.add('opacity-0', 'scale-95');
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300); // tunggu transisi selesai
                }
            });

            // Tambah efek aktif pada tombol
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('bg-green-600', 'text-white');
                btn.classList.add('bg-gray-200');
            });

            button.classList.add('bg-green-600', 'text-white');
            button.classList.remove('bg-gray-200');
        });
    });
</script>

</body>
</html>
