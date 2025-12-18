@extends('admin.layouts.app')

@section('title', 'Tambah Berita')

@section('tinymce', '#content')  <!-- Tetap di sini -->

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Tambah Berita</h2>
    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Judul Berita <span class="text-danger">*</span></label>
                <input type="text"
                       class="form-control @error('title') is-invalid @enderror"
                       id="title"
                       name="title"
                       value="{{ old('title') }}"
                       placeholder="Contoh: Peringatan Maulid Nabi Muhammad SAW"
                       required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="excerpt" class="form-label">Ringkasan <span class="text-danger">*</span></label>
                <textarea class="form-control @error('excerpt') is-invalid @enderror"
                          id="excerpt"
                          name="excerpt"
                          rows="3"
                          placeholder="Tulis ringkasan singkat berita..."
                          required>{{ old('excerpt') }}</textarea>
                @error('excerpt')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Maksimal 200 karakter</small>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Isi Berita <span class="text-danger">*</span></label>
                <textarea class="form-control @error('content') is-invalid @enderror"
                          id="content"
                          name="content"
                          rows="8"
                          placeholder="Tulis isi berita lengkap...">{{ old('content') }}</textarea>
                <!-- HAPUS: required -->
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal Berita <span class="text-danger">*</span></label>
                        <input type="date"
                               class="form-control @error('date') is-invalid @enderror"
                               id="date"
                               name="published_date"
                               value="{{ old('date', date('Y-m-d')) }}"
                               required>
                        @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Berita</label>
                        <input type="file"
                               class="form-control @error('image') is-invalid @enderror"
                               id="image"
                               name="image"
                               accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Format: JPG, PNG, JPEG. Max: 2MB</small>
                    </div>
                </div>
            </div>

            <hr>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Batal
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- JIKA PERLU VALIDASI JAVASCRIPT --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Remove required attribute (safety)
    const contentTextarea = document.getElementById('content');
    if (contentTextarea) {
        contentTextarea.removeAttribute('required');
    }
});
</script>
@endpush
@endsection