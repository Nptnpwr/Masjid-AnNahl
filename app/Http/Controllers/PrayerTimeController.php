<?php

namespace App\Http\Controllers;

use App\Models\PrayerTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Schedule;

class PrayerTimeController extends Controller
{
    public function index()
    {
        // Cek apakah admin pernah menyimpan jadwal manual hari ini
        $today = now()->toDateString();
        $manual = PrayerTime::whereDate('date', $today)->first();

        if ($manual) {
            $prayerTime = (object) $manual;
        } else {
            // Ambil otomatis dari API
            $response = Http::get('https://api.aladhan.com/v1/timingsByCity', [
                'city' => 'Jakarta',
                'country' => 'Indonesia',
                'method' => 2
            ]);

            if ($response->failed()) {
                return view('jadwal', ['prayerTime' => null]);
            }

            $data = $response->json()['data']['timings'] ?? [];

            $prayerTime = (object) [
                'location' => 'Cilegon, Indonesia',
                'date' => $today,
                'imsak' => $data['Imsak'] ?? '-',
                'subuh' => $data['Fajr'] ?? '-',
                'dzuhur' => $data['Dhuhr'] ?? '-',
                'ashar' => $data['Asr'] ?? '-',
                'maghrib' => $data['Maghrib'] ?? '-',
                'isya' => $data['Isha'] ?? '-',
            ];
        }

        return view('jadwal', compact('prayerTime'));
    }
}
