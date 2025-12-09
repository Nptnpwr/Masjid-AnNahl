@extends('admin.layouts.app')

@section('title', 'Edit Profil Masjid')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Edit Profil Masjid</h2>
        <a href="{{ route('admin.profile.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i>Kembali
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
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Tentang Masjid -->
                @include('admin.profile.parts.tentang')

                <!-- Divider -->
                <div class="border-top my-5"></div>

                <!-- Visi & Misi -->
                @include('admin.profile.parts.visimisi')

                <!-- Divider -->
                <div class="border-top my-5"></div>

                <!-- Statistik Masjid -->
                @include('admin.profile.parts.statistik')

                <!-- Divider -->
                <div class="border-top my-5"></div>

                <!-- Kontak -->
                @include('admin.profile.parts.kontak')

                <!-- Divider -->
                <div class="border-top my-5"></div>

                <!-- Lokasi & Maps -->
                @include('admin.profile.parts.lokasi')

                <!-- Divider -->
                <div class="border-top my-5"></div>

                <!-- Fasilitas -->
                @include('admin.profile.parts.fasilitas')

                <!-- Submit Button -->
                @include('admin.profile.parts.submit')
            </form>
        </div>
    </div>

    <!-- JavaScript untuk fasilitas -->
    @push('scripts')
        @vite('resources/js/admin/profile/facilities.js')
    @endpush

    <!-- CSS only for this edit profile -->
    @push('styles')
        @vite('resources/css/admin/profile/edit.css')
    @endpush
@endsection