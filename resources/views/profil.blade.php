@extends('layouts.app')

@section('title', 'Profil - Masjid An Nahl')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">Profil Masjid</h1>
                    <p class="lead">Mengenal lebih dekat Masjid An Nahl Al Mubarokah</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section-padding">
        <div class="container">
            <div class="row align-items-center">
                <!-- Foto -->
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="card card-custom">
                        <img src="{{ $profile && $profile->about_image ? asset('storage/' . $profile->about_image) : 'https://placehold.co/600x400/667eea/ffffff?text=Masjid+An+Nahl' }}"
                            class="card-img-top" alt="Masjid An Nahl" style="height: 300px; object-fit: cover;"
                            onerror="this.src='https://placehold.co/600x400/667eea/ffffff?text=Gambar+Tidak+Tersedia'">
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="col-lg-7">
                    <div>
                        <h2 class="section-title mb-4">Tentang Masjid</h2>

                        <div class="about-content">
                            <p class="text-muted mb-4">
                                {!! nl2br(e($profile->about_text_1 ?? 'Masjid An Nahl merupakan masjid yang terletak di lingkungan Fakultas Teknik Universitas Sultan Ageng Tirtayasa. Masjid ini menjadi pusat kegiatan keagamaan, pendidikan, dan sosial bagi civitas akademika dan masyarakat sekitar.')) !!}
                            </p>

                            @if(!empty($profile->about_text_2))
                                <p class="text-muted">
                                    {!! nl2br(e($profile->about_text_2)) !!}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi Misi Section -->
    <section class="section-padding bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Visi & Misi</h2>
                <p class="text-muted">Pedoman dan arah perjuangan masjid</p>
            </div>

            <div class="row g-4">
                <!-- Visi -->
                <div class="col-lg-6">
                    <div class="card card-custom h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                                    <i class="bi bi-eye-fill fs-3 text-primary"></i>
                                </div>
                                <div>
                                    <h4 class="mb-0">Visi</h4>
                                    <small class="text-muted">Tujuan utama masjid</small>
                                </div>
                            </div>

                            <div class="visi-content">
                                <p class="text-muted mb-0">
                                    {!! nl2br(e($profile->visi ?? 'Menjadi masjid yang menjadi pusat peradaban Islam, mencetak generasi muda yang berakhlak mulia, dan menjadi mercusuar dakwah di lingkungan kampus dan masyarakat.')) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Misi -->
                <div class="col-lg-6">
                    <div class="card card-custom h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-success bg-opacity-10 rounded-circle p-3 me-3">
                                    <i class="bi bi-bullseye fs-3 text-success"></i>
                                </div>
                                <div>
                                    <h4 class="mb-0">Misi</h4>
                                    <small class="text-muted">Langkah strategis masjid</small>
                                </div>
                            </div>

                            <div class="misi-content">
                                <p class="text-muted mb-0">
                                    {!! nl2br(e($profile->misi ?? '1. Menyelenggarakan kegiatan keagamaan yang berkualitas
                        2. Membina generasi muda melalui pendidikan Islam
                        3. Menjadi pusat kegiatan sosial kemasyarakatan
                        4. Mengoptimalkan fungsi masjid sebagai rumah Allah')) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Struktur Pengurus Section -->
    <section class="section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Struktur Pengurus</h2>
                <p class="text-muted">Tim pengelola Masjid An Nahl</p>
            </div>

            <div class="row justify-content-center">
                @if($pengurus && count($pengurus) > 0)
                    @foreach ($pengurus as $pengurusItem)
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="card card-custom h-100 text-center">
                                <div class="card-body p-3">
                                    <!-- Foto - PERBAIKAN DI SINI -->
                                    <div class="mb-3 d-flex justify-content-center">
                                        <div class="profile-image-container">
                                            <img src="{{ $pengurusItem->foto ? asset('storage/' . $pengurusItem->foto) : 'https://placehold.co/150x150/667eea/ffffff?text=' . urlencode(substr($pengurusItem->nama, 0, 1)) }}"
                                                class="profile-image rounded-circle shadow-sm" alt="{{ $pengurusItem->nama }}"
                                                onerror="this.src='https://placehold.co/150x150/667eea/ffffff?text=' + encodeURIComponent('{{ substr($pengurusItem->nama, 0, 1) }}')">
                                        </div>
                                    </div>

                                    <!-- Nama & Jabatan -->
                                    <h6 class="fw-bold mb-2">{{ $pengurusItem->nama }}</h6>
                                    <p class="text-primary mb-3">{{ $pengurusItem->jabatan }}</p>

                                    <!-- Kontak -->
                                    @if($pengurusItem->kontak)
                                        <div class="mt-auto">
                                            <a href="https://wa.me/{{ $pengurusItem->kontak }}" target="_blank"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-whatsapp me-1"></i> Hubungi
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center py-5">
                        <div class="bg-light rounded-circle p-4 d-inline-flex mb-3">
                            <i class="bi bi-people display-4 text-muted"></i>
                        </div>
                        <h4 class="text-muted">Struktur Pengurus Belum Tersedia</h4>
                        <p class="text-muted mb-4">Informasi struktur pengurus sedang dalam proses pembaruan</p>
                        @auth
                            <a href="{{ route('admin.pengurus.create') }}" class="btn btn-primary-custom">
                                <i class="bi bi-plus-circle"></i> Tambah Pengurus
                            </a>
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </section>

    <style>
        /* foto pengurus */
        .profile-image-container {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        /* Force rounded-circle */
        .rounded-circle {
            border-radius: 50% !important;
        }
    </style>

    <!-- Statistik Section -->
    <section class="section-padding bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Statistik Masjid</h2>
                <p class="text-muted">Data dan fakta tentang Masjid An Nahl</p>
            </div>

            <div class="row text-center">
                <div class="col-md-3 col-6 mb-4">
                    <div class="card card-custom h-100">
                        <div class="card-body p-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                                <i class="bi bi-people-fill fs-2 text-primary"></i>
                            </div>
                            <h3 class="fw-bold mb-2">{{ $profile->capacity ?? '500' }}</h3>
                            <p class="text-muted mb-0">Kapasitas Jamaah</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-6 mb-4">
                    <div class="card card-custom h-100">
                        <div class="card-body p-4">
                            <div class="bg-success bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                                <i class="bi bi-calendar-check fs-2 text-success"></i>
                            </div>
                            <h3 class="fw-bold mb-2">{{ $profile->year ?? '2010' }}</h3>
                            <p class="text-muted mb-0">Tahun Berdiri</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-6 mb-4">
                    <div class="card card-custom h-100">
                        <div class="card-body p-4">
                            <div class="bg-warning bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                                <i class="bi bi-activity fs-2 text-warning"></i>
                            </div>
                            <h3 class="fw-bold mb-2">{{ $profile->routine_activities ?? '15+' }}</h3>
                            <p class="text-muted mb-0">Kegiatan Rutin</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-6 mb-4">
                    <div class="card card-custom h-100">
                        <div class="card-body p-4">
                            <div class="bg-info bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                                <i class="bi bi-info-circle fs-2 text-info"></i>
                            </div>
                            <h3 class="fw-bold mb-2">{{ $profile->public_info ?? 'Aktif' }}</h3>
                            <p class="text-muted mb-0">Status</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fasilitas Section -->
    <section class="section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Fasilitas Masjid</h2>
                <p class="text-muted">Berbagai fasilitas untuk kenyamanan jamaah</p>
            </div>

            <div class="row g-4">
                @php
                    $facilities_raw = $profile->facilities ?? '[]';

                    // Decode JSON
                    $facilities = is_string($facilities_raw)
                        ? json_decode($facilities_raw, true)
                        : ($facilities_raw ?? []);

                    if (!is_array($facilities)) {
                        $facilities = [
                            ['name' => 'Ruang Shalat', 'icon' => 'bi-building', 'description' => 'Ruang shalat utama yang luas dan nyaman dengan kapasitas ' . ($profile->capacity ?? '780') . ' jamaah'],
                            ['name' => 'Tempat Wudhu', 'icon' => 'bi-droplet', 'description' => 'Fasilitas tempat wudhu yang bersih dan memadai untuk jamaah'],
                            ['name' => 'Toilet', 'icon' => 'bi-door-open', 'description' => 'Toilet bersih dan terawat untuk kenyamanan jamaah'],
                            ['name' => 'Ruang Serbaguna', 'icon' => 'bi-grid-3x3', 'description' => 'Ruangan untuk kajian, diskusi, dan kegiatan keislaman'],
                            ['name' => 'Ruang DKM', 'icon' => 'bi-people', 'description' => 'Ruang khusus untuk pengurus DKM dalam mengelola masjid'],
                            ['name' => 'Area Parkir', 'icon' => 'bi-car-front', 'description' => 'Area parkir yang luas dan aman untuk kendaraan jamaah']
                        ];
                    }
                @endphp


                @foreach($facilities as $facility)
                    <div class="col-md-4">
                        <div class="card card-custom text-center h-100">
                            <div class="card-body p-4">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-4 d-inline-flex mb-3">
                                    <i class="{{ $facility['icon'] ?? 'bi-building' }} fs-1 text-primary"></i>
                                </div>
                                <h5 class="card-title">{{ $facility['name'] }}</h5>
                                <p class="text-muted mb-0">{{ $facility['description'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Lokasi & Maps Section -->
    <section class="section-padding bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Lokasi Masjid</h2>
                <p class="text-muted">Temukan lokasi Masjid An Nahl</p>
            </div>

            <div class="row align-items-stretch">
                <!-- Info Lokasi -->
                <div class="col-lg-5 mb-4">
                    <div class="card card-custom h-100">
                        <div class="card-body p-4 d-flex flex-column">
                            <h4 class="fw-bold mb-4">
                                <i class="bi bi-geo-alt-fill text-primary me-2"></i>Alamat Lengkap
                            </h4>

                            <div class="mb-4 flex-grow-1">
                                <p class="mb-2">
                                    <i class="bi bi-building me-2 text-muted"></i>
                                    <strong>Masjid An Nahl</strong>
                                </p>
                                <p class="text-muted mb-3">
                                    {!! nl2br(e($profile->address ?? 'Jl. Yasmin, Kotabumi, Kec. Purwakarta, Kota Cilegon, Banten 42434')) !!}
                                </p>

                                <p class="mb-2">
                                    <i class="bi bi-clock me-2 text-muted"></i>
                                    <strong>Jam Operasional</strong>
                                </p>
                                <p class="text-muted mb-0">
                                    {!! nl2br(e($profile->operating_hours ?? 'Buka 24 Jam untuk Shalat' . "\n" . 'Administrasi: 08.00 - 17.00 WIB')) !!}
                                </p>
                            </div>

                            <div class="mt-auto">
                                @php
                                    $mapsUrl = $profile->maps_url ?? 'https://maps.google.com/?q=Masjid+Al+Mutaallimin+Fakultas+Teknik+Untirta';
                                @endphp
                                <a href="{{ $mapsUrl }}" target="_blank" class="btn btn-primary-custom w-100">
                                    <i class="bi bi-arrow-up-right-circle me-2"></i>Buka di Google Maps
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Maps -->
                <div class="col-lg-7">
                    <div class="card card-custom h-100">
                        <div class="card-body p-0 d-flex align-items-stretch"> <!-- Tambahkan ini -->
                            <!-- Google Maps Embed -->
                            @if($profile && $profile->maps_embed)
                                <div class="maps-container w-100">
                                    {!! $profile->maps_embed !!}
                                </div>
                            @else
                                <div class="maps-container w-100">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.037200799374!2d106.1504741750117!3d-6.125511993865611!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e418adaa4f7f563%3A0x950ec58123df8596!2sUniversitas%20Sultan%20Ageng%20Tirtayasa%20(UNTIRTA)%20Kampus%20Cilegon!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid"
                                        width="100%" height="100%" style="border:0; border-radius: 12px;" allowfullscreen=""
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .maps-container {
            position: relative;
            width: 100%;
            height: 100%;
            /* Biarkan 100% agar mengikuti card */
            border-radius: 12px;
            overflow: hidden;
        }

        .maps-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* HAPUS min-height dan max-height dari card-custom */
        .card-custom {
            /* Kosongkan, biarkan natural height */
        }

        /* Pastikan card-body maps stretch */
        .card-body.p-0.d-flex.align-items-stretch {
            padding: 0 !important;
        }
    </style>

    <!-- CTA Section -->
    <section class="py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="container">
            <div class="row align-items-center text-white">
                <div class="col-lg-8">
                    <h3 class="mb-2">Ingin Berkontribusi untuk Masjid?</h3>
                    <p class="mb-0 opacity-75">Mari bersama-sama memakmurkan masjid melalui donasi dan partisipasi aktif</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="{{ route('donasi') }}" class="btn btn-light btn-lg">
                        <i class="bi bi-heart-fill text-primary me-2"></i> Donasi Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- WhatsApp Button -->
    @if($profile && $profile->whatsapp)
        <div class="position-fixed" style="right: 25px; bottom: 25px; z-index: 9999;">
            <a href="https://wa.me/{{ $profile->whatsapp }}" target="_blank"
                class="btn btn-success btn-lg rounded-circle shadow"
                style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-whatsapp fs-5"></i>
            </a>
        </div>
    @endif

@endsection
