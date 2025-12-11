document.getElementById('add-facility').addEventListener('click', function () {
    const container = document.getElementById('facilities-container');
    const newItem = document.createElement('div');

    newItem.className = 'facility-item border rounded-3 p-4 mb-3 bg-light';
    newItem.innerHTML = `
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label fw-medium">Nama Fasilitas <span class="text-danger">*</span></label>
                <input type="text" name="facility_name[]" class="form-control" placeholder="Contoh: Ruang Shalat" required>
            </div>

            <div class="col-md-3">
                <label class="form-label fw-medium">Icon <span class="text-danger">*</span></label>
                <select name="facility_icon[]" class="form-select" required>
                    <option value="bi-building">Gedung</option>
                    <option value="bi-droplet">Air Wudhu</option>
                    <option value="bi-door-open">Toilet</option>
                    <option value="bi-grid-3x3">Ruang</option>
                    <option value="bi-people">Orang</option>
                    <option value="bi-car-front">Parkir</option>
                    <option value="bi-book">Buku</option>
                    <option value="bi-mic">Sound System</option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-medium">Deskripsi <span class="text-danger">*</span></label>
                <input type="text" name="facility_description[]" class="form-control" placeholder="Deskripsi singkat" required>
            </div>

            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-outline-danger remove-facility w-100 h-100 d-flex align-items-center justify-content-center rounded-3">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>
    `;

    container.appendChild(newItem);
});

// Remove item
document.addEventListener('click', function (e) {
    const removeBtn = e.target.closest('.remove-facility');

    if (removeBtn) {
        removeBtn.closest('.facility-item').remove();
    }
});
