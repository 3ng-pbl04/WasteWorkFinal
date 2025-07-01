<!DOCTYPE html>
<html lang="id"  class="scroll-smooth">
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

        .product-card {
        transition: all 0.3s ease;
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
                <li>
                    <a href="{{ url('/') }}"
                    class="{{ request()->is('/') ? 'text-green-600 font-semibold' : 'hover:text-green-600' }} transition">
                        Beranda
                    </a>
                </li>
                <li>
                    <a href="{{ url('/#company') }}"
                    class="hover:text-green-600 transition">
                        Tentang Kami
                    </a>
                </li>

                <li>
                    <a href="{{ url('/#products') }}" class="hover:text-green-600 transition">Produk</a>
                </li>
                <li>
                    <a href="{{ url('/#news') }}" class="hover:text-green-600 transition">Berita</a>
                </li>
                <li>
                    <a href="{{ url('/#testimonials') }}" class="hover:text-green-600 transition">Ulasan</a>
                </li>
                <li>
                    <a href="#contact" class="hover:text-green-600 transition">Kontak</a>
                </li>
                <li>
                    <a href="{{ route('login') }}"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                        Login
                    </a>
                </li>
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
