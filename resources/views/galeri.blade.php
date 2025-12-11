@extends('layouts.app')

@section('title', 'Galeri - Masjid An Nahl')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">Galeri</h1>
                    <p class="lead">Dokumentasi kegiatan & fasilitas Masjid An Nahl</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="section-padding">
        <div class="container">
            @if($galleries->count() > 0)
                <div class="row g-4">
                    @foreach($galleries as $gallery)
                        <div class="col-md-4 col-lg-3">
                            <div class="card card-custom h-100 overflow-hidden">

                                {{-- ============================
                                    FOTO
                                ============================= --}}
                                @if($gallery->type === 'image')
                                    <a href="{{ asset('storage/' . $gallery->file) }}" data-bs-toggle="modal"
                                        data-bs-target="#imageModal{{ $gallery->id }}">
                                        <img src="{{ asset('storage/' . $gallery->file) }}" class="card-img-top"
                                            alt="{{ $gallery->title }}"
                                            style="height: 250px; object-fit: cover; cursor: pointer; transition: transform 0.3s;"
                                            onmouseover="this.style.transform='scale(1.05)'"
                                            onmouseout="this.style.transform='scale(1)'">
                                    </a>

                                {{-- ============================
                                    VIDEO
                                ============================= --}}
                                @elseif($gallery->type === 'video')
                                    <a data-bs-toggle="modal" data-bs-target="#videoModal{{ $gallery->id }}">
                                        <video class="w-100" style="height: 250px; object-fit: cover; cursor: pointer;">
                                            <source src="{{ asset('storage/' . $gallery->file) }}">
                                        </video>
                                    </a>
                                @endif

                                <div class="card-body">
                                    <h6 class="mb-0">{{ $gallery->title }}</h6>
                                    <small class="text-muted">{{ $gallery->created_at->format('d M Y') }}</small>
                                </div>
                            </div>

                            {{-- Modal Image --}}
                            @if($gallery->type === 'image')
                                <div class="modal fade" id="imageModal{{ $gallery->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{ $gallery->title }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <img src="{{ asset('storage/' . $gallery->file) }}"
                                                    class="img-fluid w-100" alt="{{ $gallery->title }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- Modal Video --}}
                            @if($gallery->type === 'video')
                                <div class="modal fade" id="videoModal{{ $gallery->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{ $gallery->title }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <video controls class="w-100">
                                                    <source src="{{ asset('storage/' . $gallery->file) }}" type="video/mp4">
                                                </video>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-5 d-flex justify-content-center">
                    {{ $galleries->links() }}
                </div>

            @else
                <div class="text-center py-5">
                    <i class="bi bi-images display-1 text-muted mb-3"></i>
                    <h3>Belum Ada Galeri</h3>
                    <p class="text-muted">Foto dan video kegiatan akan segera ditambahkan. Pantau terus halaman ini!</p>
                </div>
            @endif
        </div>
    </section>
@endsection
