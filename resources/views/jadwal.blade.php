@php
    use Carbon\Carbon;
@endphp

@extends('layouts.app')

@section('title', 'Jadwal Sholat - Masjid An Nahl')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">Jadwal Sholat Hari Ini</h1>
                    @if($prayerTime)
                        <p class="lead">{{ $prayerTime->location }} - {{ Carbon::parse($prayerTime->date)->format('l, d F Y') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @if($prayerTime)
        <!-- Prayer Times Section -->
        <section class="section-padding">
            <div class="container">
                <!-- Main Prayer Times -->
                <div class="row g-4 mb-5">
                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="card card-custom text-center h-100 border-primary border-2">
                            <div class="card-body">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                                    <i class="bi bi-sunrise fs-2 text-primary"></i>
                                </div>
                                <h6 class="text-muted mb-2">Imsak</h6>
                                <h2 class="fw-bold mb-0">{{ $prayerTime->imsak }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="card card-custom text-center h-100 border-success border-2">
                            <div class="card-body">
                                <div class="bg-success bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                                    <i class="bi bi-brightness-high fs-2 text-success"></i>
                                </div>
                                <h6 class="text-muted mb-2">Subuh</h6>
                                <h2 class="fw-bold mb-0">{{ $prayerTime->subuh }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="card card-custom text-center h-100 border-warning border-2">
                            <div class="card-body">
                                <div class="bg-warning bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                                    <i class="bi bi-sun fs-2 text-warning"></i>
                                </div>
                                <h6 class="text-muted mb-2">Dzuhur</h6>
                                <h2 class="fw-bold mb-0">{{ $prayerTime->dzuhur }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="card card-custom text-center h-100 border-info border-2">
                            <div class="card-body">
                                <div class="bg-info bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                                    <i class="bi bi-cloud-sun fs-2 text-info"></i>
                                </div>
                                <h6 class="text-muted mb-2">Ashar</h6>
                                <h2 class="fw-bold mb-0">{{ $prayerTime->ashar }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="card card-custom text-center h-100 border-danger border-2">
                            <div class="card-body">
                                <div class="bg-danger bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                                    <i class="bi bi-sunset fs-2 text-danger"></i>
                                </div>
                                <h6 class="text-muted mb-2">Maghrib</h6>
                                <h2 class="fw-bold mb-0">{{ $prayerTime->maghrib }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="card card-custom text-center h-100 border-secondary border-2">
                            <div class="card-body">
                                <div class="bg-secondary bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                                    <i class="bi bi-moon-stars fs-2 text-secondary"></i>
                                </div>
                                <h6 class="text-muted mb-2">Isya</h6>
                                <h2 class="fw-bold mb-0">{{ $prayerTime->isya }}</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Countdown Section -->
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card card-custom" style="background: linear-gradient(135deg, #10b981 0%, #3b82f6 100%);">
                            <div class="card-body text-center text-white p-4">
                                <div class="d-flex align-items-center justify-content-center mb-3">
                                    <i class="bi bi-bell fs-2 me-2"></i>
                                    <h5 class="mb-0">Waktu Sholat Berikutnya</h5>
                                </div>
                                <h3 class="fw-bold mb-3" id="nextPrayer">-</h3>
                                <div class="d-flex justify-content-center gap-3">
                                    <div>
                                        <h2 class="fw-bold mb-0" id="hours">00</h2>
                                        <small>Jam</small>
                                    </div>
                                    <h2 class="fw-bold mb-0">:</h2>
                                    <div>
                                        <h2 class="fw-bold mb-0" id="minutes">00</h2>
                                        <small>Menit</small>
                                    </div>
                                    <h2 class="fw-bold mb-0">:</h2>
                                    <div>
                                        <h2 class="fw-bold mb-0" id="seconds">00</h2>
                                        <small>Detik</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Info Section -->
        <section class="section-padding bg-light">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card card-custom h-100">
                            <div class="card-body text-center p-4">
                                <i class="bi bi-info-circle fs-1 text-primary mb-3"></i>
                                <h5 class="card-title">Waktu Sholat</h5>
                                <p class="text-muted mb-0">Jadwal sholat di atas menggunakan waktu setempat (WIB) untuk wilayah
                                    Cilegon, Banten.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-custom h-100">
                            <div class="card-body text-center p-4">
                                <i class="bi bi-calendar-check fs-1 text-success mb-3"></i>
                                <h5 class="card-title">Update Harian</h5>
                                <p class="text-muted mb-0">Jadwal sholat diperbarui setiap hari sesuai dengan perhitungan
                                    astronomi yang akurat.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-custom h-100">
                            <div class="card-body text-center p-4">
                                <i class="bi bi-geo-alt fs-1 text-danger mb-3"></i>
                                <h5 class="card-title">Lokasi</h5>
                                <p class="text-muted mb-0">Masjid An Nahl berlokasi di Fakultas Teknik Universitas
                                    Sultan Ageng Tirtayasa.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @push('scripts')
            <script>
                // Prayer times data
                const prayerTimes = {
                    imsak: '{{ $prayerTime->imsak }}',
                    subuh: '{{ $prayerTime->subuh }}',
                    dzuhur: '{{ $prayerTime->dzuhur }}',
                    ashar: '{{ $prayerTime->ashar }}',
                    maghrib: '{{ $prayerTime->maghrib }}',
                    isya: '{{ $prayerTime->isya }}'
                };

                // Convert time string to Date object for today
                function timeToDate(timeStr) {
                    const [hours, minutes] = timeStr.split(':');
                    const date = new Date();
                    date.setHours(parseInt(hours), parseInt(minutes), 0, 0);
                    return date;
                }

                // Get next prayer
                function getNextPrayer() {
                    const now = new Date();
                    const prayers = [
                        { name: 'Imsak', time: timeToDate(prayerTimes.imsak) },
                        { name: 'Subuh', time: timeToDate(prayerTimes.subuh) },
                        { name: 'Dzuhur', time: timeToDate(prayerTimes.dzuhur) },
                        { name: 'Ashar', time: timeToDate(prayerTimes.ashar) },
                        { name: 'Maghrib', time: timeToDate(prayerTimes.maghrib) },
                        { name: 'Isya', time: timeToDate(prayerTimes.isya) }
                    ];

                    for (let prayer of prayers) {
                        if (prayer.time > now) {
                            return prayer;
                        }
                    }

                    // If all prayers passed, return tomorrow's Imsak
                    const tomorrow = timeToDate(prayerTimes.imsak);
                    tomorrow.setDate(tomorrow.getDate() + 1);
                    return { name: 'Imsak', time: tomorrow };
                }

                // Update countdown
                function updateCountdown() {
                    const nextPrayer = getNextPrayer();
                    const now = new Date();
                    const diff = nextPrayer.time - now;

                    if (diff > 0) {
                        const hours = Math.floor(diff / (1000 * 60 * 60));
                        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                        const seconds = Math.floor((diff % (1000 * 60)) / 1000);

                        document.getElementById('nextPrayer').textContent = nextPrayer.name;
                        document.getElementById('hours').textContent = String(hours).padStart(2, '0');
                        document.getElementById('minutes').textContent = String(minutes).padStart(2, '0');
                        document.getElementById('seconds').textContent = String(seconds).padStart(2, '0');
                    }
                }

                // Update every second
                updateCountdown();
                setInterval(updateCountdown, 1000);
            </script>
        @endpush

    @else
        <!-- No Prayer Time -->
        <section class="section-padding">
            <div class="container">
                <div class="text-center">
                    <i class="bi bi-calendar-x display-1 text-muted mb-3"></i>
                    <h3>Jadwal sholat belum tersedia</h3>
                    <p class="text-muted">Silakan hubungi admin untuk informasi lebih lanjut.</p>
                </div>
            </div>
        </section>
    @endif
@endsection