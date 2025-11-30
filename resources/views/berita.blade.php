@extends('layouts.app')

@section('title', 'Berita - Masjid An Nahl<')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">Berita & Artikel</h1>
                    <p class="lead">Update kabar terbaru komunitas & konten islami dari Masjid An Nahl</p>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="section-padding">
        <div class="container">
            @if($news->count() > 0)
                <div class="row g-4">
                    @foreach($news as $item)
                        <div class="col-md-6 col-lg-4">
                            <div class="card card-custom h-100">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}"
                                        style="height: 220px; object-fit: cover;">
                                @else
                                    <div style="height: 220px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"></div>
                                @endif

                                <div class="card-body d-flex flex-column">
                                    <div class="mb-2">
                                        <small class="text-muted">
                                            <i class="bi bi-calendar3"></i><i class="bi bi-calendar3"></i>
                                            {{ $item->published_date->format('d F Y') }}
                                        </small>
                                    </div>

                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    <p class="card-text text-muted flex-grow-1">{{ Str::limit($item->excerpt, 120) }}</p>

                                    <a href="{{ route('berita.detail', $item->id) }}" class="btn btn-outline-primary btn-sm mt-3">
                                        Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-5 d-flex justify-content-center">
                    {{ $news->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="bi bi-newspaper display-1 text-muted mb-3"></i>
                    <h3>Belum Ada Berita</h3>
                    <p class="text-muted">Berita akan segera diperbarui. Pantau terus halaman ini!</p>
                </div>
            @endif
        </div>
    </section>
@endsection