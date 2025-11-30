@extends('layouts.app')

@section('title', 'Beranda - Masjid An Nahl')

@section('content')
    <!-- Hero Carousel -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=1200" class="d-block w-100"
                    alt="Masjid 1">
                <div class="carousel-caption">
                    <h1 class="display-4 fw-bold">Assalamu'alaikum – Selamat Datang</h1>
                    <p class="lead">Website resmi masjid: informasi jadwal sholat, kegiatan, dan layanan jamaah.</p>
                    <div class="mt-4">
                        <a href="{{ route('jadwal') }}" class="btn btn-emerald me-2">
                            <i class="bi bi-clock"></i> Lihat Jadwal Sholat
                        </a>
                        <a href="{{ route('donasi') }}" class="btn btn-light">
                            <i class="bi bi-heart"></i> Infaq
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1564769625905-50e93615e769?w=1200" class="d-block w-100"
                    alt="Masjid 2">
                <div class="carousel-caption">
                    <h2 class="display-5 fw-bold">Tempat Ibadah dan Pembelajaran</h2>
                    <p class="lead">Masjid An Nahl Fakultas Teknik Untirta</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1542816417-0983c9c9ad53?w=1200" class="d-block w-100"
                    alt="Masjid 3">
                <div class="carousel-caption">
                    <h2 class="display-5 fw-bold">Mari Memakmurkan Masjid</h2>
                    <p class="lead">Bersama membangun spiritualitas dan akademik yang seimbang</p>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- Jadwal Sholat Section -->
    @if(isset($prayerTime))
        <div class="container my-5">
            <div class="card shadow-lg">
                <div class="card-body text-center">
                    <h3 class="fw-bold mb-3">🕋 Jadwal Sholat Hari Ini</h3>
                    <p class="text-muted">{{ $prayerTime->location }} | {{ $prayerTime->date }}</p>
                    <div class="row justify-content-center">
                        <p>Imsak: {{ $todayPrayer->imsak ?? '-' }}</p>
                        <p>Subuh: {{ $todayPrayer->fajr ?? '-' }}</p>
                        <p>Dzuhur: {{ $todayPrayer->dhuhr ?? '-' }}</p>
                        <p>Ashar: {{ $todayPrayer->asr ?? '-' }}</p>
                        <p>Maghrib: {{ $todayPrayer->maghrib ?? '-' }}</p>
                        <p>Isya: {{ $todayPrayer->isha ?? '-' }}</p>

                    </div>
                </div>
            </div>
        </div>
    @endif


    <!-- Kegiatan Section -->
    <section class="section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Kegiatan & Event</h2>
                <p class="text-muted">Agenda rutin dan insidental untuk jamaah</p>
            </div>

            <div class="row g-4">
                @forelse($activities as $activity)
                    <div class="col-md-4">
                        <div class="card card-custom h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title">{{ $activity->title }}</h5>
                                    <span class="badge bg-{{ $activity->type == 'rutin' ? 'primary' : 'warning' }}">
                                        {{ ucfirst($activity->type) }}
                                    </span>
                                </div>
                                <p class="card-text text-muted">{{ Str::limit($activity->description, 100) }}</p>
                                <div class="mt-3">
                                    <small class="text-muted d-block">
                                        <i class="bi bi-calendar"></i> {{ $activity->date }}
                                    </small>
                                    <small class="text-muted d-block">
                                        <i class="bi bi-geo-alt"></i> {{ $activity->place }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted">Belum ada kegiatan.</p>
                    </div>
                @endforelse
            </div>

            @if($activities->count() > 0)
                <div class="text-center mt-4">
                    <a href="{{ route('kegiatan') }}" class="btn btn-primary-custom">
                        Lihat Semua Kegiatan <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Berita Section -->
    <section class="section-padding bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Berita & Artikel</h2>
                <p class="text-muted">Update kabar terbaru komunitas & konten islami</p>
            </div>

            <div class="row g-4">
                @forelse($news as $item)
                    <div class="col-md-4">
                        <div class="card card-custom h-100">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}"
                                    style="height: 200px; object-fit: cover;">
                            @else
                                <div class="bg-gradient-primary"
                                    style="height: 200px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"></div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($item->excerpt, 100) }}</p>
                                <small class="text-muted">{{ $item->published_date->format('d M Y') }}</small>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <a href="{{ route('berita.detail', $item->id) }}" class="btn btn-outline-primary btn-sm">
                                    Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted">Belum ada berita.</p>
                    </div>
                @endforelse
            </div>

            @if($news->count() > 0)
                <div class="text-center mt-4">
                    <a href="{{ route('berita') }}" class="btn btn-primary-custom">
                        Lihat Semua Berita <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Galeri Section -->
    <section class="section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Galeri</h2>
                <p class="text-muted">Dokumentasi kegiatan & fasilitas masjid</p>
            </div>

            <div class="row g-4">
                @forelse($galleries as $gallery)
                    <div class="col-md-3 col-6">
                        <div class="card card-custom h-100">
                            <img src="{{ asset('storage/' . $gallery->image) }}" class="card-img-top"
                                alt="{{ $gallery->title }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <p class="mb-0">{{ $gallery->title }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted">Belum ada galeri.</p>
                    </div>
                @endforelse
            </div>

            @if($galleries->count() > 0)
                <div class="text-center mt-4">
                    <a href="{{ route('galeri') }}" class="btn btn-primary-custom">
                        Lihat Semua Galeri <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Donasi -->
    <section class="py-5" style="background: linear-gradient(135deg, #10b981 0%, #3b82f6 100%);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3 class="text-white mb-2">Dukung Program Dakwah Masjid</h3>
                    <p class="text-white mb-0">Salurkan infaq terbaik Anda untuk memakmurkan masjid</p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <a href="{{ route('donasi') }}" class="btn btn-light btn-lg">
                        <i class="bi bi-heart-fill"></i> Infaq Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection