<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Masjid An Nahl')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-color: #3b82f6;
            --primary-dark: #2563eb;
            --emerald: #10b981;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }
        
        /* ===== MINOR FIX FOR BUG ===== */
        html, body {
            max-width: 100%;
            overflow-x: hidden;
        }
        
        .about-content p,
        .visi-content p, 
        .misi-content p {
            word-wrap: break-word;
            overflow-wrap: break-word;
        }
        
        img {
            max-width: 100%;
            height: auto;
        }
        /* ===== END FIX ===== */
        
        /* Navbar */
        .navbar-custom {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }
        
        .navbar-custom .nav-link {
            color: #1e293b;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: color 0.3s;
        }
        
        .navbar-custom .nav-link:hover {
            color: var(--primary-color);
        }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 0 80px;
        }
        
        /* Card Styles */
        .card-custom {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
        }
        
        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        /* Button Styles */
        .btn-primary-custom {
            background-color: var(--primary-color);
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-primary-custom:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
        }
        
        .btn-emerald {
            background-color: var(--emerald);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
        }
        
        .btn-emerald:hover {
            background-color: #059669;
            color: white;
        }
        
        /* Footer */
        .footer-custom {
            background-color: #1e293b;
            color: #cbd5e1;
            padding: 60px 0 30px;
        }
        
        .footer-custom a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-custom a:hover {
            color: white;
        }
        
        /* Section Spacing */
        .section-padding {
            padding: 80px 0;
        }
        
        .section-title {
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        /* Carousel */
        .carousel-item {
            height: 500px;
        }
        
        .carousel-item img {
            height: 100%;
            object-fit: cover;
        }
        
        .carousel-caption {
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(5px);
            padding: 2rem;
            border-radius: 12px;
        }
        .card-custom img {
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-custom img:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="https://kompaspedia.kompas.id/wp-content/uploads/2021/07/Logo-Universitas-Sultan-Ageng-Tirtayasa_thumb.png" 
                     alt="Logo" width="65" height="40" class="rounded-circle me-2">
                <span class="fw-bold">Masjid An Nahl</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}" href="{{ route('profil') }}">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('jadwal') ? 'active' : '' }}" href="{{ route('jadwal') }}">Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('kegiatan') ? 'active' : '' }}" href="{{ route('kegiatan') }}">Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('berita') ? 'active' : '' }}" href="{{ route('berita') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('galeri') ? 'active' : '' }}" href="{{ route('galeri') }}">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('donasi') ? 'active' : '' }}" href="{{ route('donasi') }}">Donasi</a>
                    </li>
                    
                    @auth
    <!-- Jika sudah login, tampilkan Dashboard -->
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary text-white ms-2" href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </a>
                        </li>
@else
    <!-- Jika belum login, tampilkan Login -->
    <li class="nav-item">
        <a class="nav-link btn btn-outline-primary ms-2" href="{{ route('login') }}">
            <i class="bi bi-box-arrow-in-right"></i> Login Admin
        </a>
    </li>
@endauth
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    @yield('content')
    
    <!-- Footer -->
    <footer class="footer-custom">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://kompaspedia.kompas.id/wp-content/uploads/2021/07/Logo-Universitas-Sultan-Ageng-Tirtayasa_thumb.png" 
                             alt="Logo" width="65" height="40" class="rounded-circle me-2">
                        <h5 class="text-white mb-0">Masjid An Nahl</h5>
                    </div>
                    <p class="mb-3">Jl. Jenderal Sudirman KM 3, Kotabumi, Kec. Purwakarta, Kota Cilegon, Banten, 42435, Indonesia</p>
                </div>
                
                <div class="col-lg-2 col-md-4">
                    <h6 class="text-white mb-3">Tautan</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('jadwal') }}">Jadwal Sholat</a></li>
                        <li><a href="{{ route('kegiatan') }}">Kegiatan</a></li>
                        <li><a href="{{ route('donasi') }}">Donasi</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-4">
                    <h6 class="text-white mb-3">Sosial Media</h6>
                    <div class="d-flex gap-2">
                        <a href="https://www.instagram.com/untirta_official" target="_blank" class="btn btn-outline-light btn-sm">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://www.facebook.com/untirta.banten.5" target="_blank" class="btn btn-outline-light btn-sm">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UCzQJx-KyIpP3w_UjlRia-Og" target="_blank" class="btn btn-outline-light btn-sm">
                            <i class="bi bi-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <hr class="my-4 border-secondary">
            
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; {{ date('Y') }} Masjid An Nahl. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="text-decoration-none">
                        <i class="bi bi-arrow-up-circle"></i> Kembali ke atas
                    </a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>