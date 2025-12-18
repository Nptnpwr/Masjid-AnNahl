@extends('admin.layouts.app')

@section('title', 'Edit Kegiatan')

@section('tinymce', '#description')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Edit Kegiatan</h2>
        <a href="{{ route('admin.activities.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.activities.update', $activity->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Judul Kegiatan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        value="{{ old('title', $activity->title) }}" placeholder="Contoh: Kajian Rutin Ahad Pagi" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                        name="description" rows="4" placeholder="Jelaskan detail kegiatan...">{{ old('description', $activity->description) }}</textarea>
                    <!-- HAPUS: required -->
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="date" class="form-label">Tanggal <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                                name="date"
                                value="{{ old('date', \Carbon\Carbon::parse($activity->date)->format('Y-m-d')) }}" required>
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="place" class="form-label">Tempat <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('place') is-invalid @enderror" id="place"
                                name="place" value="{{ old('place', $activity->place) }}"
                                placeholder="Contoh: Masjid An Nahl" required>
                            @error('place')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Jenis Kegiatan <span class="text-danger">*</span></label>
                    <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="rutin" {{ old('type', $activity->type) == 'rutin' ? 'selected' : '' }}>Rutin</option>
                        <option value="insidental" {{ old('type', $activity->type) == 'insidental' ? 'selected' : '' }}>
                            Insidental</option>
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>

                    @if($activity->image)
                        <div class="mb-2">
                            <img src="{{ Storage::url($activity->image) }}"
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

                <hr>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.activities.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Remove required attribute
        const descTextarea = document.getElementById('description');
        if (descTextarea) {
            descTextarea.removeAttribute('required');
        }
        
        // Validasi manual
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                const editor = tinymce.get('description');
                if (!editor || editor.getContent().trim() === '') {
                    e.preventDefault();
                    alert('Deskripsi harus diisi!');
                    if (editor) editor.focus();
                    return false;
                }
            });
        }
    });
    </script>
    @endpush
@endsection