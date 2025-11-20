@extends('layouts.app')

@section('content')

{{-- HERO SECTION --}}
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Profil Masjid</h1>
                <p class="lead">Mengenal lebih dekat Masjid Al Muta'allimin Fakultas Teknik Untirta</p>
            </div>
        </div>
    </div>
</section>

{{-- ABOUT SECTION --}}
<section class="section-padding py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">

            {{-- Foto --}}
            <div class="col-md-5 mb-4">
                <img src="{{ $profile && $profile->about_image ? asset('storage/' . $profile->about_image) : asset('storage/default.jpg') }}" 
                     class="img-fluid rounded shadow" alt="Masjid">
            </div>

            {{-- Deskripsi --}}
            <div class="col-md-7">
                <h2 class="fw-bold">Tentang Masjid</h2>
                <p class="text-muted mt-3">
                    {!! nl2br(e($profile->about_text_1 ?? 'Deskripsi masjid belum tersedia.')) !!}
                </p>

                @if(!empty($profile->about_text_2))
                <p class="text-muted">
                    {!! nl2br(e($profile->about_text_2)) !!}
                </p>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- VISI MISI --}}
<section class="section-padding py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Visi & Misi</h2>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-custom shadow-sm p-4">
                    <h4 class="fw-bold mb-3">Visi</h4>
                    <p class="text-muted">
                        {!! nl2br(e($profile->visi ?? 'Visi belum tersedia.')) !!}
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-custom shadow-sm p-4">
                    <h4 class="fw-bold mb-3">Misi</h4>
                    <p class="text-muted">
                        {!! nl2br(e($profile->misi ?? 'Misi belum tersedia.')) !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- STRUKTUR PENGURUS --}}
<section class="section-padding py-5 bg-white">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Struktur Pengurus Masjid</h2>

        <div class="row justify-content-center">
            @if($pengurus && count($pengurus) > 0)
                @foreach ($pengurus as $pengurusItem)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card card-custom h-100 text-center p-3">
                        {{-- Foto --}}
                        <div class="mb-3 mx-auto">
                            <img src="{{ $pengurusItem->foto ? asset('storage/' . $pengurusItem->foto) : 'https://placehold.co/150x150?text=No+Foto' }}" 
                                 class="rounded-circle" 
                                 width="120" height="120" 
                                 style="object-fit: cover;"
                                 alt="{{ $pengurusItem->nama }}">
                        </div>
                        
                        {{-- Nama & Jabatan --}}
                        <h5 class="fw-bold mb-1">{{ $pengurusItem->nama }}</h5>
                        <p class="text-primary mb-2">{{ $pengurusItem->jabatan }}</p>
                        
                        {{-- Kontak --}}
                        @if($pengurusItem->kontak)
                        <p class="text-muted small">
                            <i class="bi bi-telephone"></i> {{ $pengurusItem->kontak }}
                        </p>
                        @endif
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <p class="text-muted">Struktur pengurus belum tersedia.</p>
                    <a href="{{ route('admin.pengurus.create') }}" class="btn btn-primary-custom mt-2">
                        Tambah Pengurus
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>

{{-- FASILITAS --}}
<section class="section-padding py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Fasilitas Masjid</h2>

        <div class="row">
            @if(isset($fasilitas) && count($fasilitas) > 0)
                @foreach ($fasilitas as $item)
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card h-100 shadow-sm text-center p-3">
                        <h5 class="fw-bold">{{ $item->nama ?? '-' }}</h5>
                        <p class="text-muted">{{ $item->keterangan ?? '-' }}</p>
                    </div>
                </div>
                @endforeach
            @else
                <p class="text-center text-muted">Belum ada fasilitas yang ditambahkan.</p>
            @endif
        </div>
    </div>
</section>

{{-- STATISTIK --}}
<section class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Statistik Masjid</h2>

        <div class="row text-center">

            <div class="col-md-3 mb-4">
                <div class="card p-4 shadow-sm">
                    <h3 class="fw-bold">{{ $profile->capacity ?? '0' }}</h3>
                    <p class="text-muted">Kapasitas Jamaah</p>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card p-4 shadow-sm">
                    <h3 class="fw-bold">{{ $profile->year ?? '0' }}</h3>
                    <p class="text-muted">Tahun Berdiri</p>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card p-4 shadow-sm">
                    <h3 class="fw-bold">{{ $profile->routine_activities ?? '-' }}</h3>
                    <p class="text-muted">Kegiatan Rutin</p>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card p-4 shadow-sm">
                    <h3 class="fw-bold">{{ $profile->public_info ?? '-' }}</h3>
                    <p class="text-muted">Informasi Publik</p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- WA BUTTON --}}
@if($profile && $profile->whatsapp)
<a href="https://wa.me/{{ $profile->whatsapp }}" 
   class="position-fixed" 
   style="right: 25px; bottom: 25px; z-index: 9999;">
    <img src="{{ asset('wa.png') }}" width="60">
</a>
@endif

@endsection
