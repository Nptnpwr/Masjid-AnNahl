@extends('layouts.app')

@section('title', 'Donasi - Masjid An Nahl')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">Infaq & Donasi</h1>
                    <p class="lead">Dukung program dakwah, pendidikan, dan sosial Masjid An Nahl</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Donation Info Section -->
    <section class="section-padding">
        <div class="container">
            <!-- Why Donate -->
            <div class="card card-custom mb-5" style="background: linear-gradient(135deg, #10b981 0%, #3b82f6 100%);">
                <div class="card-body p-4 p-lg-5 text-white">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h3 class="mb-3">Kenapa Berinfaq ke Masjid?</h3>
                            <p class="mb-0">
                                Infaq Anda akan digunakan untuk operasional masjid, kegiatan dakwah, kajian Islam,
                                bantuan sosial, dan pemeliharaan fasilitas masjid. Mari bersama-sama memakmurkan
                                rumah Allah dan mendapatkan pahala yang mengalir.
                            </p>
                        </div>
                        <div class="col-lg-4 text-center mt-4 mt-lg-0">
                            <i class="bi bi-heart-fill" style="font-size: 5rem;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bank Accounts -->
            <div class="row mb-5">
                <div class="col-12">
                    <h3 class="section-title text-center mb-4">Rekening Resmi</h3>
                </div>

                @if($donations->count() > 0)
                    @foreach($donations as $donation)
                        <div class="col-md-6 mb-4">
                            <div class="card card-custom h-100">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                                            <i class="bi bi-bank fs-3 text-primary"></i>
                                        </div>
                                        <div>
                                            <h5 class="mb-0">{{ $donation->bank }}</h5>
                                            <small class="text-muted">a.n. {{ $donation->nama_pemilik }}</small>
                                        </div>
                                    </div>

                                    <div class="bg-light rounded p-3">
                                        <label class="text-muted small mb-2">Nomor Rekening</label>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="mb-0 fw-bold font-monospace">{{ $donation->nomor_rekening }}</h4>
                                            <button class="btn btn-sm btn-outline-primary"
                                                onclick="copyToClipboard('{{ $donation->nomor_rekening }}', this)">
                                                <i class="bi bi-clipboard"></i> Salin
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            <i class="bi bi-info-circle me-2"></i>
                            Informasi rekening sedang diperbarui. Silakan hubungi admin untuk donasi.
                        </div>
                    </div>
                @endif
            </div>

            <!-- QRIS Section -->
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card card-custom">
                        <div class="card-body text-center p-5">
                            <h4 class="mb-4">Donasi via QRIS</h4>
                            <p class="text-muted mb-4">Scan kode QR di bawah untuk donasi melalui aplikasi e-wallet atau
                                m-banking</p>

                            <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#qrisModal">
                                <i class="bi bi-qr-code-scan"></i> Lihat Kode QRIS
                            </button>

                            <hr class="my-4">

                            <h6 class="mb-3">Atau Hubungi Admin</h6>
                            <a href="https://wa.me/6285891331229" target="_blank" class="btn btn-success">
                                <i class="bi bi-whatsapp"></i> Hubungi via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="section-padding bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h3 class="section-title">Manfaat Infaq</h3>
                <p class="text-muted">Kebaikan yang akan Anda dapatkan</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-custom text-center h-100">
                        <div class="card-body p-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-4 d-inline-flex mb-3">
                                <i class="bi bi-infinity fs-2 text-primary"></i>
                            </div>
                            <h5 class="mb-3">Pahala Mengalir</h5>
                            <p class="text-muted mb-0">
                                "Barang siapa yang membangun masjid karena Allah, maka Allah akan membangunkan
                                untuknya rumah di surga" (HR. Bukhari & Muslim)
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-custom text-center h-100">
                        <div class="card-body p-4">
                            <div class="bg-success bg-opacity-10 rounded-circle p-4 d-inline-flex mb-3">
                                <i class="bi bi-heart-fill fs-2 text-success"></i>
                            </div>
                            <h5 class="mb-3">Keberkahan Rezeki</h5>
                            <p class="text-muted mb-0">
                                Infaq tidak akan mengurangi harta, justru akan menambah keberkahan
                                dan membuka pintu rezeki yang lebih luas
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-custom text-center h-100">
                        <div class="card-body p-4">
                            <div class="bg-warning bg-opacity-10 rounded-circle p-4 d-inline-flex mb-3">
                                <i class="bi bi-people-fill fs-2 text-warning"></i>
                            </div>
                            <h5 class="mb-3">Membantu Sesama</h5>
                            <p class="text-muted mb-0">
                                Donasi Anda membantu operasional masjid dan program sosial
                                untuk masyarakat sekitar
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- QRIS Modal -->
    <div class="modal fade" id="qrisModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Scan QRIS untuk Donasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center p-4">
                    <img src="https://via.placeholder.com/300x300/667eea/ffffff?text=QRIS+CODE" alt="QRIS Code"
                        class="img-fluid rounded" style="max-width: 300px;">
                    <p class="text-muted mt-3 mb-0">
                        Scan menggunakan aplikasi mobile banking atau e-wallet Anda
                    </p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function copyToClipboard(text, button) {
                navigator.clipboard.writeText(text).then(function () {
                    const originalHTML = button.innerHTML;
                    button.innerHTML = '<i class="bi bi-check2"></i> Tersalin';
                    button.classList.remove('btn-outline-primary');
                    button.classList.add('btn-success');

                    setTimeout(function () {
                        button.innerHTML = originalHTML;
                        button.classList.remove('btn-success');
                        button.classList.add('btn-outline-primary');
                    }, 2000);
                });
            }
        </script>
    @endpush
@endsection