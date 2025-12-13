<div class="mb-5">
    <div class="d-flex align-items-center mb-4">
        <div class="bg-purple bg-opacity-10 p-2 rounded-circle me-3">
            <i class="bi bi-building text-purple" style="font-size: 1.2rem;"></i>
        </div>
        <h5 class="mb-0 text-purple">Fasilitas</h5>
    </div>

    <div id="facilities-container">
        @php
            $facilities = $profile->facilities ?? [
                ['name' => 'Ruang Shalat', 'icon' => 'bi-building', 'description' => 'Ruang shalat utama yang luas dan nyaman'],
                ['name' => 'Tempat Wudhu', 'icon' => 'bi-droplet', 'description' => 'Fasilitas tempat wudhu yang bersih dan memadai'],
                ['name' => 'Toilet', 'icon' => 'bi-door-open', 'description' => 'Toilet bersih dan terawat untuk kenyamanan jamaah'],
                ['name' => 'Ruang Serbaguna', 'icon' => 'bi-grid-3x3', 'description' => 'Ruangan untuk kajian, diskusi, dan kegiatan keislaman'],
                ['name' => 'Ruang DKM', 'icon' => 'bi-people', 'description' => 'Ruang khusus untuk pengurus DKM dalam mengelola masjid'],
                ['name' => 'Area Parkir', 'icon' => 'bi-car-front', 'description' => 'Area parkir yang luas dan aman untuk kendaraan jamaah']
            ];
        @endphp

        @php
              $facilities_raw = $profile->facilities ?? '[]';

                    // Decode JSON
                    $facilities = is_string($facilities_raw)
                        ? json_decode($facilities_raw, true)
                        : ($facilities_raw ?? []);

            $facilities = $facilities ?: []; // fallback empty array
        @endphp

        @foreach($facilities as $index => $facility)
            <div class="facility-item border rounded-3 p-4 mb-3 bg-light">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-medium">
                            Nama Fasilitas
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="facility_name[]" class="form-control" value="{{ $facility['name'] }}"
                            placeholder="Contoh: Ruang Shalat" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-medium">
                            Icon
                            <span class="text-danger">*</span>
                        </label>
                        <select name="facility_icon[]" class="form-select" required>
                            <option value="bi-building" {{ $facility['icon'] == 'bi-building' ? 'selected' : '' }}>Gedung</option>
                            <option value="bi-droplet" {{ $facility['icon'] == 'bi-droplet' ? 'selected' : '' }}>Air Wudhu</option>
                            <option value="bi-door-open" {{ $facility['icon'] == 'bi-door-open' ? 'selected' : '' }}>Toilet</option>
                            <option value="bi-grid-3x3" {{ $facility['icon'] == 'bi-grid-3x3' ? 'selected' : '' }}>Ruang</option>
                            <option value="bi-people" {{ $facility['icon'] == 'bi-people' ? 'selected' : '' }}>Orang</option>
                            <option value="bi-car-front" {{ $facility['icon'] == 'bi-car-front' ? 'selected' : '' }}>Parkir</option>
                            <option value="bi-book" {{ $facility['icon'] == 'bi-book' ? 'selected' : '' }}>Buku</option>
                            <option value="bi-mic" {{ $facility['icon'] == 'bi-mic' ? 'selected' : '' }}>Sound System</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-medium">
                            Deskripsi
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="facility_description[]" class="form-control"
                            value="{{ $facility['description'] }}" placeholder="Deskripsi singkat" required>
                    </div>
                    <div class="col-md-1 d-flex align-items-end">
                        <button type="button"
                            class="btn btn-outline-danger remove-facility w-100 h-100 d-flex align-items-center justify-content-center rounded-3">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <button type="button" id="add-facility" class="btn btn-outline-primary mt-3 rounded-3">
        <i class="bi bi-plus-circle me-1"></i> Tambah Fasilitas
    </button>
</div>

<script>
// ==============================
// FIXED VERSION - NO DUPLICATE EVENT LISTENERS
// ==============================

// Singleton pattern untuk mencegah multiple initialization
let facilitiesInitialized = false;

function initFacilities() {
    // Jika sudah diinisialisasi, skip
    if (facilitiesInitialized) {
        console.log('Facilities already initialized, skipping...');
        return;
    }
    
    const container = document.getElementById("facilities-container");
    if (!container) return;
    
    console.log('Initializing facilities...');
    facilitiesInitialized = true;

    function refreshDeleteButtons() {
        const items = container.querySelectorAll(".facility-item");
        console.log('Refreshing delete buttons, items:', items.length);

        items.forEach((item, index) => {
            const deleteBtn = item.querySelector(".remove-facility");
            if (!deleteBtn) return;

            if (items.length === 1) {
                deleteBtn.disabled = true;
                deleteBtn.title = "Tidak dapat menghapus, minimal harus ada satu fasilitas.";
            } else {
                deleteBtn.disabled = false;
                deleteBtn.title = "Hapus fasilitas";
            }
        });
    }

    // Template untuk fasilitas baru
    function getNewFacilityTemplate() {
        return `
            <div class="facility-item border rounded-3 p-4 mb-3 bg-light">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-medium">
                            Nama Fasilitas <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="facility_name[]" class="form-control" 
                            placeholder="Contoh: Ruang Shalat" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-medium">
                            Icon <span class="text-danger">*</span>
                        </label>
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
                        <label class="form-label fw-medium">
                            Deskripsi <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="facility_description[]" class="form-control" 
                            placeholder="Deskripsi singkat" required>
                    </div>
                    <div class="col-md-1 d-flex align-items-end">
                        <button type="button" 
                            class="btn btn-outline-danger remove-facility w-100 h-100 d-flex align-items-center justify-content-center rounded-3">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
    }

    // Fungsi untuk tambah fasilitas baru
    function addNewFacility() {
        console.log('Adding new facility...');
        const newItemHTML = getNewFacilityTemplate();
        container.insertAdjacentHTML('beforeend', newItemHTML);
        refreshDeleteButtons();
        
        // Scroll ke yang baru
        const items = container.querySelectorAll(".facility-item");
        if (items.length > 0) {
            setTimeout(() => {
                items[items.length - 1].scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'nearest' 
                });
            }, 100);
        }
    }

    // ========== EVENT HANDLERS ==========
    
    // SINGLE event listener untuk tombol "Tambah Fasilitas"
    // Gunakan event delegation dari document
    document.addEventListener('click', function(e) {
        // Tombol "Tambah Fasilitas"
        if (e.target && e.target.id === 'add-facility') {
            e.preventDefault();
            e.stopPropagation();
            console.log('Add facility button clicked');
            addNewFacility();
            return;
        }
        
        // Tombol hapus (menggunakan parent detection)
        if (e.target.closest('.remove-facility')) {
            e.preventDefault();
            e.stopPropagation();
            
            const deleteBtn = e.target.closest('.remove-facility');
            const facilityItem = deleteBtn.closest('.facility-item');
            
            if (!facilityItem) return;
            
            const items = container.querySelectorAll(".facility-item");
            
            if (items.length === 1) {
                alert("Minimal harus ada satu fasilitas. Tidak dapat menghapus fasilitas terakhir.");
                return;
            }
            
            if (confirm("Hapus fasilitas ini?")) {
                facilityItem.remove();
                refreshDeleteButtons();
            }
            return;
        }
    });

    // Inisialisasi awal
    refreshDeleteButtons();
}

// ==============================
// MODAL HANDLING
// ==============================

document.addEventListener("DOMContentLoaded", function () {
    // Inisialisasi pertama kali
    setTimeout(initFacilities, 300);
    
    // Reset flag ketika modal ditutup
    const modalFasilitas = document.getElementById('modalFasilitas');
    if (modalFasilitas) {
        modalFasilitas.addEventListener('hidden.bs.modal', function() {
            facilitiesInitialized = false;
            console.log('Modal closed, resetting initialization flag');
        });
        
        modalFasilitas.addEventListener('shown.bs.modal', function() {
            // Tunggu modal selesai render
            setTimeout(() => {
                initFacilities();
            }, 500);
        });
    }
});
</script>