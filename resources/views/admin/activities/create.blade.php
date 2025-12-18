@extends('admin.layouts.app')

@section('title', 'Tambah Kegiatan')

@section('tinymce', '#description')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Tambah Kegiatan</h2>
        <a href="{{ route('admin.activities.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.activities.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Judul Kegiatan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        value="{{ old('title') }}" placeholder="Contoh: Kajian Rutin Ahad Pagi" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                        name="description" rows="4" placeholder="Jelaskan detail kegiatan..."
                        required>{!! old('description') !!}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="date" class="form-label">Tanggal <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                                name="date" value="{{ old('date') }}" required>
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Format: YYYY-MM-DD</small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="place" class="form-label">Tempat <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('place') is-invalid @enderror" id="place"
                                name="place" value="{{ old('place') }}" placeholder="Contoh: Masjid An Nahl" required>
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
                        <option value="rutin" {{ old('type') == 'rutin' ? 'selected' : '' }}>Rutin</option>
                        <option value="insidental" {{ old('type') == 'insidental' ? 'selected' : '' }}>Insidental</option>
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                        accept="image/*">
                    <small class="text-muted">Format: JPG, JPEG, PNG, GIF. Maksimal 2MB.</small>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <hr>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.activities.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
