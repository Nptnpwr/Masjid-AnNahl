<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ActivityAdminController;
use App\Http\Controllers\Admin\NewsAdminController;
use App\Http\Controllers\Admin\GalleryAdminController;
use App\Http\Controllers\Admin\DonationAdminController;
use App\Http\Controllers\Admin\PrayerTimeAdminController;
use App\Http\Controllers\Admin\ScheduleAdminController;
use App\Http\Controllers\Admin\PengurusController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected by Auth)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Activities
    Route::resource('activities', ActivityAdminController::class);

    // News
    Route::resource('news', NewsAdminController::class);

    // Gallery
    Route::resource('galleries', GalleryAdminController::class);

    // Donation
    Route::resource('donations', DonationAdminController::class);

    // Jadwal Sholat
    Route::post('prayers/refresh', [PrayerTimeAdminController::class, 'refresh'])->name('prayers.refresh');
    Route::resource('prayers', PrayerTimeAdminController::class);

    // Profil Masjid
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');

        // edit buat masing masing kategori
        Route::get('/edit/tentang', [ProfileController::class, 'editTentang'])->name('edit.tentang');
        Route::get('/edit/visimisi', [ProfileController::class, 'editVisiMisi'])->name('edit.visimisi');
        Route::get('/edit/statistik', [ProfileController::class, 'editStatistik'])->name('edit.statistik');
        Route::get('/edit/lokasi', [ProfileController::class, 'editLokasi'])->name('edit.lokasi');
        Route::get('/edit/fasilitas', [ProfileController::class, 'editFasilitas'])->name('edit.fasilitas');
        Route::get('/edit/kontak', [ProfileController::class, 'editKontak'])->name('edit.kontak');

        // update buat ubah isi masing masing kategori
        Route::post('/update/statistik', [ProfileController::class, 'updateStatistik'])->name('update.statistik');
        Route::post('/update/tentang', [ProfileController::class, 'updateTentang'])->name('update.tentang');
        Route::post('/update/visimisi', [ProfileController::class, 'updateVisiMisi'])->name('update.visimisi');
        Route::post('/update/lokasi', [ProfileController::class, 'updateLokasi'])->name('update.lokasi');
        Route::post('/update/fasilitas', [ProfileController::class, 'updateFasilitas'])->name('update.fasilitas');
        Route::post('/update/kontak', [ProfileController::class, 'updateKontak'])->name('update.kontak');

    });



    // PENGURUS
    Route::resource('pengurus', PengurusController::class);

    // SCHEDULES
    Route::resource('schedules', ScheduleAdminController::class)->except(['show']);
});