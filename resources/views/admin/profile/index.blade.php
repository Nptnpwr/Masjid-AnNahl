@extends('admin.layouts.app')

@section('title', 'Kelola Profil Masjid')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Kelola Profil Masjid</h2>
    {{-- Tombol edit semua (opsional) --}}
    <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary rounded-3 px-4">
        <i class="bi bi-pencil-square me-1"></i> Edit Semua
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

<div class="row g-4">
    <!-- Informasi Utama -->
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="bg-white bg-opacity-25 p-2 rounded-circle me-3">
                            <i class="bi bi-info-circle-fill" style="font-size: 1.2rem;"></i>
                        </div>
                        <h5 class="mb-0">Informasi Umum</h5>
                    </div>
                    {{-- TOMBOL MODAL --}}
                    <button type="button" class="btn btn-sm btn-light rounded-pill px-3" 
                            data-bs-toggle="modal" data-bs-target="#modalStatistik">
                        <i class="bi bi-pencil-square me-1"></i> Edit
                    </button>
                </div>
            </div>
            <div class="card-body p-4">
                {{-- Isi card tetap sama seperti sebelumnya --}}
                @if($profile)
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="bg-light rounded-3 p-3 h-100">
                                <small class="text-muted d-block mb-1">Kapasitas Jamaah</small>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-people text-primary me-2"></i>
                                    <h6 class="mb-0">{{ $profile->capacity ?? 'Belum diisi' }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-light rounded-3 p-3 h-100">
                                <small class="text-muted d-block mb-1">Tahun Berdiri</small>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-calendar text-primary me-2"></i>
                                    <h6 class="mb-0">{{ $profile->year ?? 'Belum diisi' }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="bg-light rounded-3 p-3">
                                <small class="text-muted d-block mb-1">Kegiatan Rutin</small>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-activity text-primary me-2"></i>
                                    <h6 class="mb-0">{{ $profile->routine_activities ?? 'Belum diisi' }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="bg-light rounded-3 p-3">
                                <small class="text-muted d-block mb-1">Informasi Publik</small>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-info-square text-primary me-2"></i>
                                    <h6 class="mb-0">{{ $profile->public_info ?? 'Belum diisi' }}</h6>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-12"> INI GA KEPAKE SUMPAH
                            <div class="bg-light rounded-3 p-3">
                                <small class="text-muted d-block mb-1">WhatsApp</small>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-whatsapp text-success me-2"></i>
                                    <h6 class="mb-0">{{ $profile->whatsapp ?? 'Belum diisi' }}</h6>
                                </div>
                            </div>
                        </div> -->
                    </div>
                @else
                    <div class="text-center py-5">
                        <div class="bg-light rounded-circle p-4 d-inline-block mb-3">
                            <i class="bi bi-building text-muted" style="font-size: 2rem;"></i>
                        </div>
                        <h5 class="text-muted">Profil Masjid Belum Diisi</h5>
                        <p class="text-muted mb-4">Klik tombol "Edit Profil" untuk mengisi data pertama</p>
                        <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary">
                            <i class="bi bi-pencil-square me-1"></i> Mulai Isi Profil
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Tentang Masjid -->
        <div class="card shadow-sm border-0 mt-4">
            <div class="card-header bg-success text-white border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="bg-white bg-opacity-25 p-2 rounded-circle me-3">
                            <i class="bi bi-building" style="font-size: 1.2rem;"></i>
                        </div>
                        <h5 class="mb-0">Tentang Masjid</h5>
                    </div>
                    {{-- TOMBOL MODAL --}}
                    <button type="button" class="btn btn-sm btn-light rounded-pill px-3" 
                            data-bs-toggle="modal" data-bs-target="#modalTentang">
                        <i class="bi bi-pencil-square me-1"></i> Edit
                    </button>
                </div>
            </div>
            <div class="card-body p-4">
                {{-- Isi card tentang masjid --}}
                @if($profile && $profile->about_text_1)
                    <div class="mb-4">
                        <small class="text-muted d-block mb-2">Deskripsi Utama</small>
                        <div class="bg-light rounded-3 p-3">
                            <p class="mb-0" style="text-align: justify; line-height: 1.6;">{{ $profile->about_text_1 }}</p>
                        </div>
                    </div>
                    @if($profile->about_text_2)
                    <div>
                        <small class="text-muted d-block mb-2">Deskripsi Tambahan</small>
                        <div class="bg-light rounded-3 p-3">
                            <p class="mb-0" style="text-align: justify; line-height: 1.6;">{{ $profile->about_text_2 }}</p>
                        </div>
                    </div>
                    @endif
                @else
                    <div class="text-center py-4">
                        <i class="bi bi-file-text text-muted" style="font-size: 2rem;"></i>
                        <p class="text-muted mt-2 mb-0">Deskripsi masjid belum diisi</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Visi & Misi -->
        <div class="card shadow-sm border-0 mt-4">
            <div class="card-header bg-warning text-dark border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="bg-white bg-opacity-25 p-2 rounded-circle me-3">
                            <i class="bi bi-bullseye" style="font-size: 1.2rem;"></i>
                        </div>
                        <h5 class="mb-0">Visi & Misi</h5>
                    </div>
                    {{-- TOMBOL MODAL --}}
                    <button type="button" class="btn btn-sm btn-light rounded-pill px-3" 
                            data-bs-toggle="modal" data-bs-target="#modalVisiMisi">
                        <i class="bi bi-pencil-square me-1"></i> Edit
                    </button>
                </div>
            </div>
            <div class="card-body p-4">
                {{-- Isi card visi misi --}}
                @if($profile)
                    <div class="mb-4">
                        <small class="text-muted d-block mb-2">Visi</small>
                        <div class="bg-light rounded-3 p-3">
                            <p class="mb-0" style="text-align: justify; line-height: 1.6; white-space: pre-line;">
                                {{ $profile->visi ? $profile->visi : 'Belum diisi' }}
                            </p>
                        </div>
                    </div>
                    <div>
                        <small class="text-muted d-block mb-2">Misi</small>
                        <div class="bg-light rounded-3 p-3">
                            <p class="mb-0" style="text-align: justify; line-height: 1.6; white-space: pre-line;">
                                {{ $profile->misi ? $profile->misi : 'Belum diisi' }}
                            </p>
                        </div>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="bi bi-bullseye text-muted" style="font-size: 2rem;"></i>
                        <p class="text-muted mt-2 mb-0">Visi dan misi belum diisi</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Lokasi & Maps -->
        <div class="card shadow-sm border-0 mt-4">
            <div class="card-header bg-danger text-white border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="bg-white bg-opacity-25 p-2 rounded-circle me-3">
                            <i class="bi bi-geo-alt-fill" style="font-size: 1.2rem;"></i>
                        </div>
                        <h5 class="mb-0">Lokasi & Maps</h5>
                    </div>
                    <button type="button" class="btn btn-sm btn-light rounded-pill px-3" 
                            data-bs-toggle="modal" data-bs-target="#modalLokasi">
                        <i class="bi bi-pencil-square me-1"></i> Edit
                    </button>
                </div>
            </div>
            <div class="card-body p-4">
                @if($profile)
                    <div class="mb-4">
                        <small class="text-muted d-block mb-2">Alamat</small>
                        <div class="bg-light rounded-3 p-3">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-geo-alt text-danger me-2 mt-1"></i>
                                <p class="mb-0">{{ $profile->address ?? 'Belum diisi' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <small class="text-muted d-block mb-2">Jam Operasional</small>
                        <div class="bg-light rounded-3 p-3">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-clock text-danger me-2 mt-1"></i>
                                <p class="mb-0" style="white-space: pre-line;">{{ $profile->operating_hours ? $profile->operating_hours : 'Belum diisi' }}</p>
                            </div>
                        </div>
                    </div>
                    
                    {{-- TAMBAH BAGIAN INI UNTUK MAPS EMBED --}}
                    @if($profile->maps_embed)
                    <div class="mb-4">
                        <small class="text-muted d-block mb-2">Peta Lokasi</small>
                        <div class="bg-light rounded-3 p-3">
                            <div class="ratio ratio-16x9">
                                {!! $profile->maps_embed !!}
                            </div>
                            <div class="text-center mt-2">
                                <small class="text-muted">Peta interaktif lokasi masjid</small>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    @if($profile->maps_url)
                    <div class="mb-4">
                        <small class="text-muted d-block mb-2">Google Maps URL</small>
                        <div class="bg-light rounded-3 p-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-link-45deg text-danger me-2"></i>
                                <div class="flex-grow-1 text-truncate"> {{-- ← TEXT-TRUNCATE --}}
                                    <a href="{{ $profile->maps_url }}" target="_blank" 
                                    class="text-decoration-none" 
                                    title="{{ $profile->maps_url }}">
                                        {{ Str::limit($profile->maps_url, 40) }} {{-- ← LIMIT CHARACTER --}}
                                    </a>
                                </div>
                                {{-- Tombol copy (optional) --}}
                                <button class="btn btn-sm btn-outline-secondary ms-2" 
                                        onclick="copyToClipboard('{{ $profile->maps_url }}')"
                                        title="Copy link">
                                    <i class="bi bi-copy"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif
                @else
                    <div class="text-center py-4">
                        <i class="bi bi-geo-alt text-muted" style="font-size: 2rem;"></i>
                        <p class="text-muted mt-2 mb-0">Informasi lokasi belum diisi</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">
        <!-- Gambar Masjid -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-info text-white border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="bg-white bg-opacity-25 p-2 rounded-circle me-3">
                            <i class="bi bi-image" style="font-size: 1.2rem;"></i>
                        </div>
                        <h5 class="mb-0">Gambar Masjid</h5>
                    </div>
                    <button type="button" class="btn btn-sm btn-light rounded-pill px-3" 
                            data-bs-toggle="modal" data-bs-target="#modalTentang">
                        <i class="bi bi-pencil-square me-1"></i> Edit
                    </button>
                </div>
            </div>
            <div class="card-body p-4 text-center">
                @if($profile && $profile->about_image)
                    <img src="{{ asset('storage/' . $profile->about_image) }}" 
                         class="img-fluid rounded-3" 
                         alt="Gambar Masjid"
                         style="max-height: 250px; object-fit: cover; width: 100%;">
                    <p class="text-muted mt-3 mb-0">
                        <i class="bi bi-check-circle-fill text-success me-1"></i>
                        Gambar tersedia
                    </p>
                @else
                    <div class="py-4">
                        <div class="bg-light rounded-circle p-4 d-inline-block mb-3">
                            <i class="bi bi-image text-muted" style="font-size: 2rem;"></i>
                        </div>
                        <p class="text-muted mb-0">Belum ada gambar</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Fasilitas -->
        <div class="card shadow-sm border-0 mt-4">
            <div class="card-header bg-purple text-white border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="bg-white bg-opacity-25 p-2 rounded-circle me-3">
                            <i class="bi bi-list-check" style="font-size: 1.2rem;"></i>
                        </div>
                        <h5 class="mb-0">Fasilitas</h5>
                    </div>
                    {{-- TOMBOL MODAL --}}
                    <button type="button" class="btn btn-sm btn-light rounded-pill px-3" 
                            data-bs-toggle="modal" data-bs-target="#modalFasilitas">
                        <i class="bi bi-pencil-square me-1"></i> Edit
                    </button>
                </div>
            </div>
            <div class="card-body p-4">
                {{-- Isi card fasilitas --}}
                @php
                    $facilitiesArray = [];
                    
                    if ($profile && $profile->facilities) {
                        if (is_string($profile->facilities)) {
                            $facilitiesArray = json_decode($profile->facilities, true) ?? [];
                        } else {
                            $facilitiesArray = (array) $profile->facilities;
                        }
                    }
                @endphp
                
                @if(!empty($facilitiesArray))
                    <div class="row g-3">
                        @foreach($facilitiesArray as $facility)
                            <div class="col-12">
                                <div class="bg-light rounded-3 p-3">
                                    <div class="d-flex align-items-start">
                                        <div class="bg-purple bg-opacity-10 p-2 rounded-circle me-3">
                                            <i class="{{ $facility['icon'] ?? 'bi-building' }} text-purple" style="font-size: 1.2rem;"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">{{ $facility['name'] ?? 'Fasilitas' }}</h6>
                                            @if(!empty($facility['description']))
                                                <small class="text-muted">{{ $facility['description'] }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-4">
                        <div class="bg-light rounded-circle p-4 d-inline-block mb-3">
                            <i class="bi bi-list-check text-muted" style="font-size: 2rem;"></i>
                        </div>
                        <p class="text-muted mb-0">Belum ada fasilitas</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Kontak -->
        <div class="card shadow-sm border-0 mt-4">
            <div class="card-header bg-secondary text-white border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="bg-white bg-opacity-25 p-2 rounded-circle me-3">
                            <i class="bi bi-telephone" style="font-size: 1.2rem;"></i>
                        </div>
                        <h5 class="mb-0">Kontak</h5>
                    </div>
                    {{-- TOMBOL MODAL --}}
                    <button type="button" class="btn btn-sm btn-light rounded-pill px-3" 
                            data-bs-toggle="modal" data-bs-target="#modalKontak">
                        <i class="bi bi-pencil-square me-1"></i> Edit
                    </button>
                </div>
            </div>
            <div class="card-body p-4">
                {{-- Isi card kontak --}}
                @if($profile && $profile->whatsapp)
                    <div class="text-center">
                        <div class="bg-light rounded-3 p-4">
                            <i class="bi bi-whatsapp text-success" style="font-size: 2rem;"></i>
                            <h6 class="mt-3">{{ $profile->whatsapp }}</h6>
                            <small class="text-muted">Nomor WhatsApp</small>
                        </div>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="bi bi-telephone text-muted" style="font-size: 2rem;"></i>
                        <p class="text-muted mt-2 mb-0">Kontak belum diisi</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- ============================= -->
<!-- MODAL-MODAL UNTUK EDIT -->
<!-- ============================= -->

<!-- Modal: Statistik/Informasi Umum -->
<div class="modal fade" id="modalStatistik" tabindex="-1" aria-labelledby="modalStatistikLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalStatistikLabel">
                    <i class="bi bi-info-circle-fill me-2"></i> Informasi Umum
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.profile.update.statistik') }}" method="POST">
                @csrf
                <div class="modal-body">
                    @include('admin.profile.parts.statistik')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Tentang Masjid -->
<div class="modal fade" id="modalTentang" tabindex="-1" aria-labelledby="modalTentangLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="modalTentangLabel">
                    <i class="bi bi-building me-2"></i> Tentang Masjid
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.profile.update.tentang') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    @include('admin.profile.parts.tentang')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Visi & Misi -->
<div class="modal fade" id="modalVisiMisi" tabindex="-1" aria-labelledby="modalVisiMisiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title" id="modalVisiMisiLabel">
                    <i class="bi bi-bullseye me-2"></i> Edit Visi & Misi
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.profile.update.visimisi') }}" method="POST">
                @csrf
                <div class="modal-body">
                    @include('admin.profile.parts.visimisi')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-check-circle me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Lokasi -->
<div class="modal fade" id="modalLokasi" tabindex="-1" aria-labelledby="modalLokasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="modalLokasiLabel">
                    <i class="bi bi-geo-alt-fill me-2"></i> Edit Lokasi & Maps
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.profile.update.lokasi') }}" method="POST">
                @csrf
                <div class="modal-body">
                    @include('admin.profile.parts.lokasi')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-check-circle me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Fasilitas -->
<div class="modal fade" id="modalFasilitas" tabindex="-1" aria-labelledby="modalFasilitasLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-purple text-white">
                <h5 class="modal-title" id="modalFasilitasLabel">
                    <i class="bi bi-list-check me-2"></i> Edit Fasilitas
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.profile.update.fasilitas') }}" method="POST" id="modalFacilitiesForm">
                @csrf
                <div class="modal-body">
                    @include('admin.profile.parts.fasilitas')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-purple text-white">
                        <i class="bi bi-check-circle me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Kontak -->
<div class="modal fade" id="modalKontak" tabindex="-1" aria-labelledby="modalKontakLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="modalKontakLabel">
                    <i class="bi bi-telephone me-2"></i> Edit Kontak
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.profile.update.kontak') }}" method="POST">
                @csrf
                <div class="modal-body">
                    @include('admin.profile.parts.kontak')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-dark">
                        <i class="bi bi-check-circle me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
:root {
    --purple: #6f42c1;
}

.bg-purple {
    background-color: var(--purple) !important;
}

.text-purple {
    color: var(--purple) !important;
}

.btn-purple {
    background-color: var(--purple) !important;
    border-color: var(--purple) !important;
    color: white !important;
}

.btn-purple:hover {
    background-color: #5a32a3 !important;
    border-color: #5a32a3 !important;
}

.card {
    border: none;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.card-header {
    border-radius: 0.75rem 0.75rem 0 0 !important;
    padding: 1rem 1.5rem !important;
}

.bg-light {
    background-color: #f8f9fa !important;
}

.rounded-3 {
    border-radius: 0.75rem !important;
}

.btn-primary {
    padding: 0.5rem 1.5rem;
    font-weight: 500;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

/* Modal styles */
.modal-content {
    border-radius: 0.75rem;
    border: none;
}

.modal-header {
    border-radius: 0.75rem 0.75rem 0 0;
    padding: 1.25rem 1.5rem;
}

.modal-body {
    padding: 1.5rem;
}

.modal-footer {
    padding: 1rem 1.5rem;
    border-top: 1px solid #dee2e6;
}

/* Tambahan untuk icon fasilitas */
.bg-purple.bg-opacity-10 {
    background-color: rgba(111, 66, 193, 0.1) !important;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>

@push('scripts')
<script>
// Clean up untuk modal fasilitas
document.addEventListener('DOMContentLoaded', function() {
    const modalFasilitas = document.getElementById('modalFasilitas');
    
    if (modalFasilitas) {
        // Reset ketika modal ditutup
        modalFasilitas.addEventListener('hidden.bs.modal', function() {
            // Force reset global flag
            if (typeof facilitiesInitialized !== 'undefined') {
                facilitiesInitialized = false;
            }
        });
        
        // Clean initialization ketika modal dibuka
        modalFasilitas.addEventListener('shown.bs.modal', function() {
            // Hapus event listener lama jika ada
            const oldAddBtn = document.getElementById('add-facility');
            if (oldAddBtn && oldAddBtn._hasListener) {
                oldAddBtn.removeEventListener('click', oldAddBtn._clickHandler);
            }
            
            // Beri waktu untuk DOM update
            setTimeout(() => {
                if (typeof initFacilities === 'function') {
                    initFacilities();
                }
            }, 300);
        });
    }
    
    // Auto close modal setelah submit
    document.querySelectorAll('.modal form').forEach(form => {
        form.addEventListener('submit', function(e) {
            // Validasi khusus untuk form fasilitas
            if (this.action.includes('fasilitas')) {
                const facilityNames = this.querySelectorAll('input[name="facility_name[]"]');
                let isValid = true;
                
                facilityNames.forEach(input => {
                    if (!input.value.trim()) {
                        isValid = false;
                        input.classList.add('is-invalid');
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                    alert('Semua nama fasilitas harus diisi!');
                    return;
                }
            }
            
            // Auto close setelah 1 detik
            setTimeout(() => {
                const modal = bootstrap.Modal.getInstance(this.closest('.modal'));
                if (modal) modal.hide();
            }, 1000);
        });
    });
});
</script>
@endpush
@endsection