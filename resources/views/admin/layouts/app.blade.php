<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - Masjid An Nahl</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-color: #3b82f6;
            --primary-dark: #2563eb;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #f8f9fa;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            background-color: #1e293b;
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #cbd5e1;
            padding: 0.75rem 1rem;
            transition: all 0.3s;
            border-radius: 0;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(59, 130, 246, 0.1);
            color: white;
        }

        .sidebar .nav-link.active {
            background-color: var(--primary-color);
            color: white;
        }

        .sidebar .nav-link i {
            font-size: 1.1rem;
        }

        @media (max-width: 767.98px) {
            .sidebar {
                top: 3rem;
            }
        }

        /* Main Content */
        main {
            padding-top: 20px;
        }

        /* Top Navbar */
        .navbar-admin {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
        }

        /* Card Styles */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .card-header {
            background-color: white;
            border-bottom: 2px solid #e2e8f0;
            font-weight: 600;
        }

        /* Stats Card */
        .stats-card {
            border-left: 4px solid var(--primary-color);
        }

        .stats-card.emerald {
            border-left-color: #10b981;
        }

        .stats-card.amber {
            border-left-color: #f59e0b;
        }

        .stats-card.rose {
            border-left-color: #f43f5e;
        }

        /* Table */
        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }
    </style>

    @stack('styles')
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse" id="sidebarMenu">
                <div class="position-sticky pt-3">
                    <div class="text-center mb-4">
                        <img src="https://kompaspedia.kompas.id/wp-content/uploads/2021/07/Logo-Universitas-Sultan-Ageng-Tirtayasa_thumb.png"
                            alt="Logo" width="75" height="50" class="rounded-circle mb-2">
                        <h6 class="text-white">Admin Panel</h6>
                        <p class="text-info small mb-0">{{ Auth::user()->name ?? 'Admin' }}</p>
                    </div>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                                href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-speedometer2 me-2"></i>
                                Dashboard
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('admin.activities.*') ? 'active' : '' }}"
                                href="{{ route('admin.activities.index') }}">
                                <i class="bi bi-calendar-event me-2"></i>
                                Kegiatan
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('admin.news.*') ? 'active' : '' }}"
                                href="{{ route('admin.news.index') }}">
                                <i class="bi bi-newspaper me-2"></i>
                                Berita
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}"
                                href="{{ route('admin.galleries.index') }}">
                                <i class="bi bi-images me-2"></i>
                                Galeri
                            </a>
                        </li>

                        <!-- <li class="nav-item {{ request()->routeIs('admin.prayers.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.prayers.index') }}">
                                <i class="bi bi-images me-2"></i>
                                Jadwal Solat
                            </a>
                        </li> -->

                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}"
                                href="{{ route('admin.profile.edit') }}">
                                <i class="bi bi-building me-2"></i>
                                Profil Masjid
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('admin.pengurus.*') ? 'active' : '' }}"
                                href="{{ route('admin.pengurus.index') }}">
                                <i class="bi bi-people-fill me-2"></i>
                                Pengurus Masjid
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('admin.donations.*') ? 'active' : '' }}"
                                href="{{ route('admin.donations.index') }}">
                                <i class="bi bi-cash-coin me-2"></i>
                                Donasi
                            </a>
                        </li>

                        {{-- <hr class="text-secondary"> --}}

                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('home') }}">
                                <i class="bi bi-globe me-2"></i>
                                Lihat Website
                            </a>
                        </li>

                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="nav-link text-white border-0 bg-transparent w-100 text-start">
                                    <i class="bi bi-box-arrow-left me-2"></i>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- Top Navbar -->
                <nav class="navbar navbar-admin navbar-expand-lg sticky-top mb-4">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#sidebarMenu">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="ms-auto d-flex align-items-center">
                            <span class="me-3">
                                <i class="bi bi-person-circle"></i>
                                {{ Auth::user()->name ?? 'Admin' }}
                            </span>
                        </div>
                    </div>
                </nav>

                <!-- Alert Messages -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-circle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Page Content -->
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>