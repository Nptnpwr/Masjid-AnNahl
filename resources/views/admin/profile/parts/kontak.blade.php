<div class="mb-5">
    <div class="d-flex align-items-center mb-4">
        <div class="bg-info bg-opacity-10 p-2 rounded-circle me-3">
            <i class="bi bi-telephone text-info" style="font-size: 1.2rem;"></i>
        </div>
        <h5 class="mb-0 text-info">Kontak</h5>
    </div>

    <div>
        <label for="whatsapp" class="form-label fw-medium">
            Nomor WhatsApp
            <span class="text-danger">*</span>
        </label>
        <input type="text" name="whatsapp" id="whatsapp" pattern="[0-9]+"
            class="form-control @error('whatsapp') is-invalid @enderror"
            value="{{ old('whatsapp', $profile->whatsapp ?? '') }}" required>
        @error('whatsapp')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
        <div class="form-text">Masukkan nomor tanpa tanda + atau spasi</div>
    </div>
</div>