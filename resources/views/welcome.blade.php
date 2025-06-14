<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trash 2 Move - Solusi Daur Ulang untuk Masa Depan Lebih Hijau</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/LOGO.png') }}" type="image/png">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

</head>

<body>
    <!-- Header & Navigation -->
      <header>
        <div class="container header-container">
            <div class="logo">
                <img src="images/LOGO.png" alt="EcoRecycle Logo">
                <h1>TRASH2MOVE</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="#home">Beranda</a></li>
                    <li><a href="#company">Tentang Kami</a></li>
                    <li><a href="#products">Produk</a></li>
                    <li><a href="#news">Berita</a></li>
                    <li><a href="#testimonials">Ulasan</a></li>
                    <li><a href="#contact">Kontak</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <h2>Ubah Sampah Menjadi Solusi</h2>
            <p>Misi kami adalah mendaur ulang limbah menjadi produk berkualitas tinggi yang tidak hanya ramah lingkungan tetapi juga fungsional dan estetis.</p>
            <div class="cta-buttons">
                <a href="/pengaduan/create">
                    <button class="btn btn-primary" onclick="openModal('location-modal')">
                      Ajukan Lokasi Aksi
                    </button>
                  <a href="/volunteer/create">
                    <button class="btn btn-info" onclick="openModal('location-modal')">
                      Jadi Volunteer
                    </button>
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container stats-container">
            <div class="stat-item">
                <div class="stat-number">15,000+</div>
                <div class="stat-label">Ton Sampah Didaur Ulang</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">500+</div>
                <div class="stat-label">Produk Inovatif</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">250+</div>
                <div class="stat-label">Komunitas Terlibat</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">10,000+</div>
                <div class="stat-label">Pohon Ditanam</div>
            </div>
        </div>
    </section>

    <!-- Company Profile Section -->
    <section id="company" class="company-profile">
        <div class="container">
            <div class="section-title">
                <h2>Tentang Kami</h2>
            </div>

            <div class="about-grid">
                <div class="about-image">
                    <img src="images/team.jpg" alt="Tim EcoRecycle" style="width: 100%; border-radius: 10px;">
                </div>
                <div class="about-content">
                    <h3>Visi</h3>
                    <p>Menciptakan dunia yang lebih hijau dan berkelanjutan melalui inovasi dalam daur ulang.</p>
                    <br>
                    <h3>Misi</h3>
                    <p>Mengubah limbah menjadi produk berkualitas tinggi yang ramah lingkungan, fungsional, dan estetis.</p>
                    <br>
                    <h3>Kenapa Kami?</h3>
                    <ul>
                        <li><strong>Keunikan:</strong> Produk kami dirancang dengan kreativitas dan inovasi yang tinggi.</li>
                        <li><strong>Keberlanjutan:</strong> Kami berkomitmen untuk menjaga lingkungan dengan menggunakan bahan daur ulang.</li>
                        <li><strong>Perawatan Rendah:</strong> Produk kami mudah dirawat dan tahan lama.</li>
                        <li><strong>Tahan Cuaca:</strong> Dirancang untuk bertahan dalam berbagai kondisi cuaca.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Section -->
    <section id="products" class="products">
        <div class="container">
            <div class="section-title">
                <h2>Produk Kami</h2>
            </div>

            <div class="product-filters">
                <button class="filter-btn active">Semua</button>
                <button class="filter-btn">Furniture</button>
                <button class="filter-btn">Aksesori</button>
                <button class="filter-btn">Kemasan</button>
            </div>

            <div class="product-grid">
    @foreach ($postingans as $post)
        <div class="product-card">
            <div class="product-image">
            <img src="{{ Storage::url($post->gambar) }}" alt="{{ $post->judul }}">
            </div>
            <div class="product-info">
                <h3 class="product-title">{{ $post->nama }}</h3>
                <p class="product-description">{{ $post->deskripsi }}</p>
                <div class="product-meta">
                    <span class="product-price">Rp {{ number_format($post->harga, 0, ',', '.') }}</span>
                    <span class="product-rating">{!! render_stars($post->rating) !!}</span>
                </div>
                <button class="buy-btn" onclick="window.open('{{ $post->link }}', '_blank');">Beli</button>
            </div>
        </div>
    @endforeach
</div>
    </section>



    <!-- News Section - Added new section -->
    <section id="news" class="news">
        <div class="container">
            <div class="section-title">
                <h2>Berita Terkini</h2>
            </div>

            <div class="news-grid">
        @foreach ($beritas as $berita)
            <div class="news-card">
                <div class="news-image">
                    <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}">
                    <div class="news-date">{{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }}</div>
                </div>
                <div class="news-content">
                    <div class="news-category">Program</div>
                    <h3 class="news-title">{{ $berita->judul }}</h3>
                    <p class="news-excerpt">{{ Str::limit($berita->deskripsi, 150) }}</p>

                    {{-- Jika berita punya slug, arahkan ke detail dinamis --}}
                    @if ($berita->slug)
                        <a href="{{ route('berita.detail', ['slug' => $berita->slug]) }}" class="read-more">Baca selengkapnya →</a>
                    @else
                        {{-- Atau fallback ke static --}}
                        <a href="{{ route('berita.detail1') }}" class="read-more">Baca selengkapnya →</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
            </div>

            <div class="see-all-news">
                <a href="#" class="btn btn-primary">Lihat Semua Berita</a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="section-title">
                <h2>Ulasan Pelanggan</h2>
            </div>

            <div class="swiper testimonial-carousel" style="margin-bottom: 80px;">
                <div class="swiper-wrapper">
                    @foreach($ulasans->take(5) as $ulasan)
                    <div class="swiper-slide testimonial-item">
                        <p class="testimonial-text">"{{ $ulasan->deskripsi }}"</p>
                        <p class="testimonial-author">{{ $ulasan->nama }}</p>
                        <p class="testimonial-role">{{ $ulasan->pekerjaan ?? 'Pelanggan' }}</p>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>


            <!-- Add Comment Section -->
            <div class="add-comment mt-3">
                <h3>Tambahkan Komentar Anda</h3>
            <form id="comment-form" method="POST" action="{{ route('ulasan.store') }}">
                    @csrf
        <div class="form-group">
            <label for="comment-name">Nama</label>
            <input type="text" id="comment-name" name="nama" class="form-input" placeholder="Masukkan nama Anda" required>
        </div>

        <div class="form-group">
            <label for="comment-role">Peran</label>
            <input type="text" id="comment-role" name="peran" class="form-input" placeholder="Masukkan peran Anda (misalnya, Pelanggan, Volunteer, dll.)" required>
        </div>

        <div class="form-group">
            <label for="comment-text">Komentar</label>
            <textarea id="comment-text" name="deskripsi" class="form-textarea" placeholder="Tulis komentar Anda di sini..." required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Komentar</button>
    </form>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Bergabunglah Dengan Gerakan Daur Ulang</h2>
            <p>Bersama kita bisa menciptakan masa depan yang lebih berkelanjutan. Daftarkan diri Anda sebagai volunteer atau ajukan lokasi daur ulang hari ini!</p>
            <div class="cta-buttons">
                <button class="btn btn-white" onclick="openModal('location-modal')">Ajukan Lokasi Aksi</button>
                <button class="btn btn-white" onclick="openModal('volunteer-modal')">Jadi Volunteer</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <div class="footer-logo">
                        <img src="images/LOGO.png" alt="EcoRecycle Logo">
                        <h2>Trash2Move</h2>
                    </div>
                    <p>Trash2Move adalah perusahaan daur ulang inovatif yang mendedikasikan diri untuk mengubah limbah menjadi produk bernilai tinggi sambil membangun komunitas yang sadar lingkungan.</p>
           <div class="social-links">
    <a href="#" class="fb" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
    <a href="#" class="ig" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
    <a href="#" class="tw" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
    <a href="#" class="yt" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
</div>


                </div>

                <div class="footer-links-section">
                    <h3 class="footer-heading">Produk</h3>
                    <ul class="footer-links">
                        <li><a href="#">Furniture</a></li>
                        <li><a href="#">Aksesori</a></li>
                        <li><a href="#">Kemasan</a></li>
                        <li><a href="#">Dekorasi</a></li>
                    </ul>
                </div>

                <div class="footer-links-section">
                    <h3 class="footer-heading">Perusahaan</h3>
                    <ul class="footer-links">
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Tim</a></li>
                        <li><a href="#">Karir</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>

                <div class="footer-links-section">
                    <h3 class="footer-heading">Kontak</h3>
                    <ul class="footer-links">
                        <li>Jl. Hijau Lestari No.123</li>
                        <li>Jakarta Selatan, Indonesia</li>
                        <li>+62 21 1234 5678</li>
                        <li>info@ecorecycle.id</li>
                    </ul>
                </div>
            </div>

            <div class="copyright">
                &copy; 2025 Zikry. Hak Cipta Dilindungi.
            </div>
        </div>
    </footer>

    <!-- Modal - Volunteer Form -->
    <div id="volunteer-modal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('volunteer-modal')">&times;</span>
            <h2 class="modal-title">Daftar Sebagai Volunteer</h2>

            <form id="volunteer-form">
                <div class="form-group">
                    <label class="form-label" for="volunteer-name">Nama Lengkap</label>
                    <input type="text" id="volunteer-name" class="form-input" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="volunteer-email">Email</label>
                    <input type="email" id="volunteer-email" class="form-input" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="volunteer-phone">Nomor Telepon</label>
                    <input type="tel" id="volunteer-phone" class="form-input" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="volunteer-availability">Ketersediaan Waktu</label>
                    <select id="volunteer-availability" class="form-select" required>
                        <option value="">Pilih ketersediaan</option>
                        <option value="weekday">Hari Kerja</option>
                        <option value="weekend">Akhir Pekan</option>
                        <option value="both">Keduanya</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="volunteer-skills">Keahlian & Pengalaman</label>
                    <textarea id="volunteer-skills" class="form-textarea" placeholder="Ceritakan tentang keahlian dan pengalaman yang relevan..."></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="volunteer-motivation">Motivasi</label>
                    <textarea id="volunteer-motivation" class="form-textarea" placeholder="Mengapa Anda tertarik menjadi volunteer EcoRecycle?"></textarea>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%;">Kirim Aplikasi</button>
            </form>
        </div>
    </div>

    <!-- Modal - Location Form -->
    <div id="location-modal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('location-modal')">&times;</span>
        </div>
    </div>

            <!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


    <script>
  document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper(".testimonial-carousel", {
      slidesPerView: 1,       // Tampilkan 1 ulasan saja
      spaceBetween: 10,
      loop: true,
      grabCursor: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      },
      // breakpoints dihapus agar tetap 1 ulasan di semua ukuran layar
    });
  });
</script>


