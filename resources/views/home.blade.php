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
                <img src="https://lh3.googleusercontent.com/gps-cs-s/AG0ilSz1vQC_MFp5wQXqmjVa9Bvz82pqGf9ry0EiZdMuoDYuypKH8u5hnzK6U5w3nJDGBlnvNE9nOEb461SuXG5poB88oNp9w-iUU6q9iY3vbL3yHsJmw58XWllaifBmp5GDju8quI-k=s1360-w1360-h1020-rw" class="d-block w-100"
                    alt="Masjid 1">
                <div class="carousel-caption px-2 px-sm-3 px-md-4">
                    <h1 class="display-6 display-md-4 display-lg-3 fw-bold">Assalamu'alaikum – Selamat Datang</h1>
                    <p class="lead d-none d-sm-block">Website resmi masjid: informasi jadwal sholat, kegiatan, dan layanan jamaah.</p>
                    <div class="mt-3 mt-md-4">
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
                <img src="https://lh3.googleusercontent.com/gps-cs-s/AG0ilSyEPNM_hi0czrDZ8pdqU3BRbIV1-E1REp5WFoItyw5pTxdx1SkUQ6qHscFyxjui5QlWUljc4aMFgx8yYicGxiUKsxeGfHxma7vAK6qIJM5dJFVQLfBOSx2n5o1Sqb8FNJY01PIJ=s1360-w1360-h1020-rw" class="d-block w-100"
                    alt="Masjid 2">
                <div class="carousel-caption">
                    <h2 class="display-5 fw-bold">Tempat Ibadah dan Pembelajaran</h2>
                    <p class="lead">Masjid An Nahl Al Mubarokah</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://lh3.googleusercontent.com/gps-cs-s/AG0ilSyWApIKB9Gxz3iF4QswV2PiLuzjithm8A_6QfcI1XmpO8GeUCV5nBTMIlnwmE1pGtlL6tuzdQ6KCrWEy7FYEsGTdpPmEdwn3b9wrhAB-oSXZ_-SU0_TDRFoLqXyUCUa8Nzo9LF9qw=s1360-w1360-h1020-rw" class="d-block w-100"
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

    <!-- Jadwal Sholat Section
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
        </div> -->
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
                                <p class="card-text text-muted">{!! Str::limit($activity->description, 100) !!}</p>
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

<<!-- Galeri Section -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Galeri</h2>
            <p class="text-muted">Dokumentasi kegiatan & fasilitas masjid</p>
        </div>

        <div class="row g-4">
            @forelse($galleries as $gallery)
                @php
                    $media = $gallery->image ?? $gallery->video;
                    $ext = strtolower(pathinfo($media, PATHINFO_EXTENSION));

                    $isImage = in_array($ext, ['jpg','jpeg','png','gif','webp']);
                    $isVideo = in_array($ext, ['mp4','mov','avi','mkv','webm']);

                    // Fix untuk path yang tidak lengkap
                    $videoPath = $gallery->video;
                    if ($videoPath && !str_contains($videoPath, '/')) {
                        $videoPath = 'galleries/videos/' . $videoPath;
                    }

                    $imagePath = $gallery->image;
                    if ($imagePath && !str_contains($imagePath, '/')) {
                        $imagePath = 'galleries/images/' . $imagePath;
                    }
                @endphp

                <div class="col-md-3 col-6">
                    <div class="card card-custom h-100 gallery-card-landing">
                        <div class="position-relative" style="height: 200px; overflow: hidden; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalGallery{{ $gallery->id }}">
                            @if ($isImage && $gallery->image)
                                <img
                                    src="{{ Storage::url($imagePath) }}"
                                    class="w-100 h-100 gallery-img-landing"
                                    alt="{{ $gallery->title }}"
                                    style="object-fit: cover;"
                                    onerror="this.parentElement.innerHTML='<div class=\'d-flex justify-content-center align-items-center w-100 h-100 bg-light\'><i class=\'bi bi-image-fill text-muted\' style=\'font-size: 3rem;\'></i></div>'"
                                >

                                {{-- Zoom overlay untuk gambar --}}
                                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center gallery-overlay-landing">
                                    <i class="bi bi-zoom-in text-white" style="font-size: 2.5rem;"></i>
                                </div>

                            @elseif ($isVideo && $gallery->video)
                                <video
                                    preload="metadata"
                                    class="w-100 h-100"
                                    style="object-fit: cover; background: #000;"
                                    playsinline
                                >
                                    <source src="{{ Storage::url($videoPath) }}" type="video/mp4">
                                </video>

                                {{-- Play button overlay --}}
                                <div class="position-absolute top-50 start-50 translate-middle" style="pointer-events: none;">
                                    <i class="bi bi-play-circle-fill text-white" style="font-size: 3.5rem; opacity: 0.9; text-shadow: 0 2px 8px rgba(0,0,0,0.5);"></i>
                                </div>

                            @else
                                <div class="d-flex justify-content-center align-items-center w-100 h-100 bg-light">
                                    <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                        </div>

                        <div class="card-body">
                            <h5 class="card-title mb-2" style="font-size: 0.95rem;">{{ $gallery->title }}</h5>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <small class="text-muted">
                                    <i class="bi bi-calendar3"></i>
                                    {{ $gallery->created_at->format('d M Y') }}
                                </small>

                                @if($isVideo)
                                    <span class="badge bg-primary">
                                        <i class="bi bi-camera-video"></i> Video
                                    </span>
                                @elseif($isImage)
                                    <span class="badge bg-success">
                                        <i class="bi bi-image"></i> Foto
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Modal untuk preview full --}}
                <div class="modal fade" id="modalGallery{{ $gallery->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $gallery->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-0">
                                @if ($isImage && $gallery->image)
                                    <img
                                        src="{{ Storage::url($imagePath) }}"
                                        alt="{{ $gallery->title }}"
                                        class="w-100"
                                        style="object-fit: contain; max-height: 80vh;"
                                    >
                                @elseif ($isVideo && $gallery->video)
                                    <video
                                        controls
                                        class="w-100"
                                        style="background: #000; max-height: 80vh;"
                                        playsinline
                                    >
                                        <source src="{{ Storage::url($videoPath) }}" type="video/mp4">
                                        Browser Anda tidak mendukung video ini.
                                    </video>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <small class="text-muted me-auto">
                                    <i class="bi bi-calendar3"></i>
                                    {{ $gallery->created_at->format('d F Y, H:i') }}
                                </small>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
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

{{-- Custom Styles untuk Landing Gallery --}}
<style>
.gallery-card-landing {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.gallery-card-landing:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.12) !important;
}

.gallery-img-landing {
    transition: transform 0.3s ease;
}

.gallery-card-landing:hover .gallery-img-landing {
    transform: scale(1.05);
}

.gallery-overlay-landing {
    background: rgba(0,0,0,0.5);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.gallery-card-landing:hover .gallery-overlay-landing {
    opacity: 1;
}

.modal-content {
    border-radius: 1rem;
    overflow: hidden;
}
</style>

</style>

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
