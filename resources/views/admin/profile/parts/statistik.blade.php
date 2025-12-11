<div class="mb-5">
    <div class="d-flex align-items-center mb-4">
        <div class="bg-warning bg-opacity-10 p-2 rounded-circle me-3">
            <i class="bi bi-graph-up text-warning" style="font-size: 1.2rem;"></i>
        </div>
        <h5 class="mb-0 text-warning">Statistik Masjid</h5>
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <label for="capacity" class="form-label fw-medium">
                Kapasitas Jamaah
                <span class="text-danger">*</span>
            </label>
            <input type="number" name="capacity" id="capacity"
                class="form-control @error('capacity') is-invalid @enderror"
                value="{{ old('capacity', $profile->capacity ?? '') }}" placeholder="Contoh: 500" required>
            @error('capacity')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="year" class="form-label fw-medium">
                Tahun Berdiri
                <span class="text-danger">*</span>
            </label>
            <input type="number" name="year" id="year" class="form-control @error('year') is-invalid @enderror"
                value="{{ old('year', $profile->year ?? '') }}" placeholder="Contoh: 1990" required>
            @error('year')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mt-4">
        <label for="routine_activities" class="form-label fw-medium">
            Kegiatan Rutin
            <span class="text-danger">*</span>
        </label>
        <input type="text" name="routine_activities" id="routine_activities"
            class="form-control @error('routine_activities') is-invalid @enderror"
            value="{{ old('routine_activities', $profile->routine_activities ?? '') }}"
            placeholder="Contoh: Pengajian Mingguan, TPQ, dll" required>
        @error('routine_activities')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-4">
        <label for="public_info" class="form-label fw-medium">
            Informasi Publik
            <span class="text-danger">*</span>
        </label>
        <input type="text" name="public_info" id="public_info"
            class="form-control @error('public_info') is-invalid @enderror"
            value="{{ old('public_info', $profile->public_info ?? '') }}" placeholder="Contoh: Terbuka untuk umum"
            required>
        @error('public_info')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>