<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f3f4f6;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #1e293b;
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 2rem;
        }
        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #cbd5e1;
            text-decoration: none;
            transition: 0.2s;
        }
        .sidebar a:hover {
            background: #334155;
            color: white;
        }
        .content {
            margin-left: 260px;
            padding: 30px;
        }
    </style>

    @stack('styles')
</head>
<body>

    <!-- Sidebar Admin -->
    <div class="sidebar">
        <h4 class="text-center mb-4">Admin Panel</h4>
        
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.profile.edit') }}">Profil Masjid</a>
        <a href="{{ route('admin.pengurus.index') }}">Data Pengurus</a>
        <a href="{{ route('admin.activities.index') }}">Kegiatan</a>
        <a href="{{ route('admin.news.index') }}">Berita</a>
        <a href="{{ route('admin.galleries.index') }}">Galeri</a>
        <a href="{{ route('admin.donations.index') }}">Donasi</a>
        <a href="{{ route('admin.prayers.index') }}">Jadwal Sholat</a>
        <a href="{{ route('admin.logout') }}">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
