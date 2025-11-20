<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ActivityAdminController;
use App\Http\Controllers\Admin\NewsAdminController;
use App\Http\Controllers\Admin\GalleryAdminController;
use App\Http\Controllers\Admin\DonationAdminController;
use App\Http\Controllers\Admin\MasjidProfileAdminController;
use App\Http\Controllers\Admin\PrayerTimeAdminController;
use App\Http\Controllers\Admin\ScheduleAdminController;
use App\Http\Controllers\Admin\PengurusController;
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
    Route::get('profile/edit', [MasjidProfileAdminController::class, 'edit'])->name('profile.edit');
    Route::post('profile/update', [MasjidProfileAdminController::class, 'update'])->name('profile.update');

    // ✅ PENGURUS - DIPINDAH dari web.php
    Route::resource('pengurus', PengurusController::class);

    // ✅ SCHEDULES - DIPINDAH dari web.php  
    Route::resource('schedules', ScheduleAdminController::class)->except(['show']);
});