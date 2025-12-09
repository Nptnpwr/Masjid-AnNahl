<!-- Tentang Masjid -->
<div class="mb-5">
    <div class="d-flex align-items-center mb-4">
        <div class="bg-primary bg-opacity-10 p-2 rounded-circle me-3">
            <i class="bi bi-building text-primary" style="font-size: 1.2rem;"></i>
        </div>
        <h5 class="mb-0 text-primary">Tentang Masjid</h5>
    </div>

    <div class="mb-4">
        <label for="about_image" class="form-label fw-medium">Gambar Tentang Masjid</label>
        <input type="file" name="about_image" id="about_image"
            class="form-control @error('about_image') is-invalid @enderror" accept="image/*">
        @error('about_image')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
        <div class="form-text">Format: JPG, JPEG, PNG. Maksimal 2MB.</div>

        @if(!empty($profile->about_image))
            <div class="mt-3">
                <p class="text-muted mb-2">Gambar saat ini:</p>
                <img src="{{ asset('storage/' . $profile->about_image) }}" class="rounded-3 border"
                    style="width: 200px; height: 150px; object-fit: cover;" alt="Gambar Masjid">
            </div>
        @endif
    </div>

    <div class="mb-4">
        <label for="about_text_1" class="form-label fw-medium">
            Deskripsi Tentang Masjid (Bagian 1)
            <span class="text-danger">*</span>
        </label>
        <textarea name="about_text_1" id="about_text_1" class="form-control @error('about_text_1') is-invalid @enderror"
            rows="4" placeholder="Tuliskan deskripsi tentang masjid..."
            required>{{ old('about_text_1', $profile->about_text_1 ?? '') }}</textarea>
        @error('about_text_1')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="about_text_2" class="form-label fw-medium">Deskripsi Tentang Masjid (Bagian 2)</label>
        <textarea name="about_text_2" id="about_text_2" class="form-control @error('about_text_2') is-invalid @enderror"
            rows="4"
            placeholder="Tuliskan deskripsi tambahan tentang masjid...">{{ old('about_text_2', $profile->about_text_2 ?? '') }}</textarea>
        @error('about_text_2')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>