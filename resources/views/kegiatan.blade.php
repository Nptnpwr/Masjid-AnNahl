@extends('layouts.app')

@section('title', 'Kegiatan - Masjid An Nahl')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">Kegiatan & Event</h1>
                    <p class="lead">Agenda rutin dan insidental untuk jamaah Masjid An Nahl</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Activities Section -->
    <section class="section-padding">
        <div class="container">
            @if($activities->count() > 0)
                <div class="row g-4">
                    @foreach($activities as $activity)
                        <div class="col-md-6 col-lg-4">
                            <div class="card card-custom h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <h5 class="card-title mb-0">{{ $activity->title }}</h5>
                                        <span class="badge bg-{{ $activity->type == 'rutin' ? 'primary' : 'warning' }} ms-2">
                                            {{ ucfirst($activity->type) }}
                                        </span>
                                    </div>

                                    <p class="card-text text-muted">{{ $activity->description }}</p>

                                    <div class="mt-4">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="bi bi-calendar3 text-primary me-2"></i>
                                            <small class="text-muted">{{ $activity->date }}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-geo-alt text-danger me-2"></i>
                                            <small class="text-muted">{{ $activity->place }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-5 d-flex justify-content-center">
                    {{ $activities->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="bi bi-calendar-x display-1 text-muted mb-3"></i>
                    <h3>Belum Ada Kegiatan</h3>
                    <p class="text-muted">Kegiatan akan segera diumumkan. Pantau terus halaman ini!</p>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3 class="mb-2">Ingin Mengadakan Kegiatan di Masjid?</h3>
                    <p class="text-muted mb-0">Hubungi pengurus DKM untuk informasi lebih lanjut tentang peminjaman ruang
                        dan fasilitas</p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <a href="https://wa.me/6285891331229" target="_blank" class="btn btn-primary-custom">
                        <i class="bi bi-whatsapp"></i> Hubungi Admin
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection