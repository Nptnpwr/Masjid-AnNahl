@extends('admin.layouts.app')

@section('title', 'Edit Berita')

@section('tinymce', '#content')  <!-- SEBELUM @section('content') -->

@section('content')  <!-- DIMULAI SETELAH TINYMCE -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Edit Berita</h2>
    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Judul Berita <span class="text-danger">*</span></label>
                <input type="text"
                       class="form-control @error('title') is-invalid @enderror"
                       id="title"
                       name="title"
                       value="{{ old('title', $news->title) }}"
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
                          required>{{ old('excerpt', $news->excerpt) }}</textarea>
                @error('excerpt')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Isi Berita <span class="text-danger">*</span></label>
                <textarea class="form-control @error('content') is-invalid @enderror"
                          id="content"
                          name="content"
                          rows="8"
                          placeholder="Tulis isi berita lengkap...">{{ old('content', $news->content) }}</textarea>
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
                               value="{{ old('date', \Carbon\Carbon::parse($news->date)->format('Y-m-d')) }}"
                               required>
                        @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Berita</label>

                        @if($news->image)
                            <div class="mb-2">
                                <img src="{{ Storage::url($news->image) }}"
                                     alt="Current Image"
                                     class="img-thumbnail"
                                     style="max-width: 200px;">
                                <p class="small text-muted mt-1">Gambar saat ini</p>
                            </div>
                        @endif

                        <input type="file"
                               class="form-control @error('image') is-invalid @enderror"
                               id="image"
                               name="image"
                               accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                    </div>
                </div>
            </div>

            <hr>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Batal
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Update
                </button>
            </div>
        </form>
    </div>
</div>

{{-- TAMBAH VALIDASI JAVASCRIPT --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Force remove required attribute dari textarea content
    const contentTextarea = document.getElementById('content');
    if (contentTextarea) {
        contentTextarea.removeAttribute('required');
    }
    
    // Validasi manual sebelum submit
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const editor = tinymce.get('content');
            if (!editor || editor.getContent().trim() === '') {
                e.preventDefault();
                alert('Isi berita harus diisi!');
                if (editor) editor.focus();
                return false;
            }
        });
    }
});
</script>
@endpush
@endsection