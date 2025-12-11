<div class="mb-5">
    <div class="d-flex align-items-center mb-4">
        <div class="bg-success bg-opacity-10 p-2 rounded-circle me-3">
            <i class="bi bi-bullseye text-success" style="font-size: 1.2rem;"></i>
        </div>
        <h5 class="mb-0 text-success">Visi & Misi</h5>
    </div>

    <div class="mb-4">
        <label for="visi" class="form-label fw-medium">
            Visi Masjid
            <span class="text-danger">*</span>
        </label>
        <textarea name="visi" id="visi" class="form-control @error('visi') is-invalid @enderror" rows="3"
            placeholder="Tuliskan visi masjid..." required>{{ old('visi', $profile->visi ?? '') }}</textarea>
        @error('visi')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
        <div class="form-text">Gunakan enter untuk membuat paragraf baru</div>
    </div>

    <div class="mb-4">
        <label for="misi" class="form-label fw-medium">
            Misi Masjid
            <span class="text-danger">*</span>
        </label>
        <textarea name="misi" id="misi" class="form-control @error('misi') is-invalid @enderror" rows="3"
            placeholder="Tuliskan misi masjid..." required>{{ old('misi', $profile->misi ?? '') }}</textarea>
        @error('misi')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
        <div class="form-text">Gunakan enter untuk membuat poin-poin misi</div>
    </div>
</div>