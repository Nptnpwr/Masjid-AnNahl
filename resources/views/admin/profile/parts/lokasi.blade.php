<div class="mb-5">
    <div class="d-flex align-items-center mb-4">
        <div class="bg-danger bg-opacity-10 p-2 rounded-circle me-3">
            <i class="bi bi-geo-alt text-danger" style="font-size: 1.2rem;"></i>
        </div>
        <h5 class="mb-0 text-danger">Lokasi & Maps</h5>
    </div>

    <div class="mb-4">
        <label for="address" class="form-label fw-medium">
            Alamat Lengkap
            <span class="text-danger">*</span>
        </label>
        <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" rows="3"
            placeholder="Tuliskan alamat lengkap masjid..."
            required>{{ old('address', $profile->address ?? '') }}</textarea>
        @error('address')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="operating_hours" class="form-label fw-medium">
            Jam Operasional
            <span class="text-danger">*</span>
        </label>
        <textarea name="operating_hours" id="operating_hours"
            class="form-control @error('operating_hours') is-invalid @enderror" rows="2"
            placeholder="Contoh: Buka 24 Jam untuk Shalat&#10;Administrasi: 08.00 - 17.00 WIB"
            required>{{ old('operating_hours', $profile->operating_hours ?? '') }}</textarea>
        @error('operating_hours')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
        <div class="form-text">Gunakan enter untuk baris baru</div>
    </div>

    <div class="mb-4">
        <label for="maps_embed" class="form-label fw-medium">
            Embed Google Maps
            <span class="text-danger">*</span>
        </label>
        <textarea name="maps_embed" id="maps_embed" class="form-control @error('maps_embed') is-invalid @enderror"
            rows="4" placeholder="Paste kode embed Google Maps di sini..."
            required>{{ old('maps_embed', $profile->maps_embed ?? '') }}</textarea>
        @error('maps_embed')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
        <div class="form-text">
            Cara mendapatkan embed code:<br>
            1. Buka Google Maps<br>
            2. Cari lokasi masjid<br>
            3. Klik "Share" → "Embed a map"<br>
            4. Copy kode iframe dan paste di sini
        </div>
    </div>

    <div>
        <label for="maps_url" class="form-label fw-medium">
            Google Maps URL
            <span class="text-danger">*</span>
        </label>
        <input type="url" name="maps_url" id="maps_url" class="form-control" ...
            value="{{ old('maps_url', $profile->maps_url ?? '') }}" placeholder="Contoh: https://goo.gl/maps/xxxx"
            required>
        @error('maps_url')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
        <div class="form-text">Link untuk tombol "Buka di Google Maps"</div>
    </div>
</div>