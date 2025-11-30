@extends('admin.layouts.app')

@section('title', 'Edit Rekening Donasi')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Edit Rekening Donasi</h2>
        <a href="{{ route('admin.donations.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.donations.update', $donation->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="bank" class="form-label">Nama Bank <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('bank') is-invalid @enderror" id="bank" name="bank"
                        value="{{ old('bank', $donation->bank) }}" placeholder="Contoh: Bank BCA, Bank Mandiri, BSI"
                        required>
                    @error('bank')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nomor_rekening" class="form-label">Nomor Rekening <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nomor_rekening') is-invalid @enderror"
                        id="nomor_rekening" name="nomor_rekening"
                        value="{{ old('nomor_rekening', $donation->nomor_rekening) }}" placeholder="Contoh: 1234567890"
                        required>
                    @error('nomor_rekening')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_pemilik" class="form-label">Nama Pemilik Rekening <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" id="nama_pemilik"
                        name="nama_pemilik" value="{{ old('nama_pemilik', $donation->nama_pemilik) }}"
                        placeholder="Contoh: Masjid An Nahl" required>
                    @error('nama_pemilik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <hr>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.donations.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection