@extends('admin.layouts.app')

@section('title', 'Tambah Galeri')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Tambah Galeri</h2>
    <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            {{-- Judul --}}
            <div class="mb-3">
                <label for="title" class="form-label">Judul Foto/Video</label>
                <input type="text" 
                       class="form-control @error('title') is-invalid @enderror" 
                       id="title" 
                       name="title" 
                       value="{{ old('title') }}"
                       placeholder="Contoh: Kegiatan Kajian Subuh">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Upload Foto --}}
            <div class="mb-3">
                <label for="image" class="form-label">Upload Foto</label>
                <input type="file" 
                       class="form-control @error('image') is-invalid @enderror" 
                       id="image" 
                       name="image"
                       accept="image/*"
                       onchange="previewImage(event)">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Format: JPG, PNG, JPEG, GIF. Max: 4MB</small>

                <div class="mt-3" id="imagePreview" style="display: none;">
                    <p class="small text-muted mb-2">Preview Foto:</p>
                    <img id="preview" src="" alt="Preview" class="img-thumbnail" style="max-width: 300px;">
                </div>
            </div>

            {{-- Upload Video --}}
            <div class="mb-3">
                <label for="video" class="form-label">Upload Video</label>
                <input type="file" 
                       class="form-control @error('video') is-invalid @enderror" 
                       id="video" 
                       name="video"
                       accept="video/*">
                @error('video')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Format: MP4, AVI, MOV, WEBM. Max: 500MB</small>
            </div>

            <hr>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Batal
                </a>
                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
            document.getElementById('imagePreview').style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
}
</script>
@endpush
