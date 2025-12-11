@extends('admin.layouts.app')

@section('title', 'Edit Profil Masjid')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Edit Profil Masjid</h2>
        <a href="{{ route('admin.profile.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-2"></i>
                <div>{{ session('success') }}</div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <div>Terdapat kesalahan dalam pengisian form. Silakan periksa kembali.</div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <!-- Tentang Masjid -->
            <div id="tentang-section">
                <form action="{{ route('admin.profile.update.tentang') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('admin.profile.parts.tentang')
                    @include('admin.profile.parts.submit')
                </form>
            </div>

            <!-- Divider -->
            <div class="border-top my-5"></div>

            <!-- Visi & Misi -->
            <div id="visimisi-section">
                <form action="{{ route('admin.profile.update.visimisi') }}" method="POST">
                    @csrf
                    @include('admin.profile.parts.visimisi')
                    @include('admin.profile.parts.submit')
                </form>
            </div>

            <!-- Divider -->
            <div class="border-top my-5"></div>

            <!-- Statistik Masjid -->
            <div id="statistik-section">
                <form action="{{ route('admin.profile.update.statistik') }}" method="POST">
                    @csrf
                    @include('admin.profile.parts.statistik')
                    @include('admin.profile.parts.submit')
                </form>
            </div>

            <!-- Divider -->
            <div class="border-top my-5"></div>


            <!-- Kontak -->
            <div id="kontak-section">
                <form action="{{ route('admin.profile.update.kontak') }}" method="POST">
                    @csrf
                    @include('admin.profile.parts.kontak')
                    @include('admin.profile.parts.submit')
                </form>
            </div>

            <!-- Divider -->
            <div class="border-top my-5"></div>

            <!-- Lokasi & Maps -->
            <div id="lokasi-section">
                <form action="{{ route('admin.profile.update.lokasi') }}" method="POST">
                    @csrf
                    @include('admin.profile.parts.lokasi')
                    @include('admin.profile.parts.submit')
                </form>
            </div>

            <!-- Divider -->
            <div class="border-top my-5"></div>

            <!-- Fasilitas -->
            <div id="fasilitas-section">
                <form action="{{ route('admin.profile.update.fasilitas') }}" method="POST" id="facilities-form">
                    @csrf
                    @include('admin.profile.parts.fasilitas')
                    @include('admin.profile.parts.submit')
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript untuk fasilitas -->
    @push('scripts')
        @vite('resources/js/admin/profile/facilities.js')
    @endpush

    <!-- Smooth Scroll Script -->
    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Jika URL ada hash (#section), scroll ke section tersebut
        if (window.location.hash) {
            const hash = window.location.hash;
            const target = document.querySelector(hash);
            
            if (target) {
                // Tunggu sebentar agar DOM fully loaded
                setTimeout(() => {
                    // Smooth scroll ke element
                    target.scrollIntoView({ 
                        behavior: 'smooth',
                        block: 'start'
                    });
                    
                    // Tambah highlight visual
                    const originalBorder = target.style.border;
                    target.style.transition = 'all 0.5s ease';
                    target.style.border = '3px solid rgba(59, 130, 246, 0.3)';
                    target.style.borderRadius = '10px';
                    target.style.padding = '15px';
                    target.style.margin = '-15px';
                    target.style.backgroundColor = 'rgba(59, 130, 246, 0.05)';
                    
                    // Hilangkan highlight setelah 2 detik
                    setTimeout(() => {
                        target.style.border = originalBorder;
                        target.style.padding = '';
                        target.style.margin = '';
                        target.style.backgroundColor = '';
                    }, 2000);
                    
                }, 300);
            }
        }
    });
    </script>
    @endpush

    <!-- CSS only for this edit profile -->
    @push('styles')
        @vite('resources/css/admin/profile/edit.css')
    @endpush
@endsection