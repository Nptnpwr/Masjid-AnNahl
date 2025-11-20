<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrayerTimeController;
use App\Models\PrayerTime;

/*
|--------------------------------------------------------------------------
| Web Routes - Public
|--------------------------------------------------------------------------
*/

// Public Routes - Website Masjid
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
Route::get('/jadwal', [HomeController::class, 'jadwal'])->name('jadwal');
Route::get('/kegiatan', [HomeController::class, 'kegiatan'])->name('kegiatan');
Route::get('/berita', [HomeController::class, 'berita'])->name('berita');
Route::get('/berita/{id}', [HomeController::class, 'beritaDetail'])->name('berita.detail');
Route::get('/galeri', [HomeController::class, 'galeri'])->name('galeri');
Route::get('/donasi', [HomeController::class, 'donasi'])->name('donasi');

// Jadwal sholat untuk user
Route::get('/jadwal-sholat', [HomeController::class, 'jadwal'])->name('jadwal.sholat');

Route::get('/jadwal', [PrayerTimeController::class, 'index'])->name('jadwal'); 
Route::get('/jadwal-dark', [PrayerTimeController::class, 'index'])->name('jadwal.dark');
Route::get('/jadwal-swipe', [PrayerTimeController::class, 'index'])->name('jadwal.swipe');
Route::get('/jadwal-islami', [PrayerTimeController::class, 'index'])->name('jadwal.islami');

// Authentication
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Admin Routes - LOAD SEMUA dari admin.php
|--------------------------------------------------------------------------
*/
require __DIR__.'/admin.php';