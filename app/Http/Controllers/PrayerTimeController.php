<?php

namespace App\Http\Controllers;

use App\Models\PrayerTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Schedule;
use Illuminate\Support\Facades\Cache;

class PrayerTimeController extends Controller
{
    private $defaultCity = 'Cilegon';
    private $defaultCountry = 'Indonesia';
    private $calculationMethod = 2;
    
    public function index()
    {
        $today = now()->toDateString();
        
        // Cek apakah ada jadwal manual untuk hari ini
        $manualPrayerTime = PrayerTime::whereDate('date', $today)->first();
        
        if ($manualPrayerTime) {
            $prayerTime = $this->formatManualData($manualPrayerTime);
        } else {
            // Coba ambil dari cache dulu
            $cacheKey = "prayer_time_{$today}";
            $prayerTime = Cache::remember($cacheKey, 3600, function () use ($today) {
                return $this->fetchFromApi($today);
            });
            
            // Jika API gagal, gunakan data kemarin sebagai fallback
            if (!$prayerTime) {
                $prayerTime = $this->getFallbackData();
            }
        }
        
        return view('jadwal', compact('prayerTime'));
    }
    
    private function fetchFromApi($date)
    {
        try {
            $response = Http::timeout(10)->retry(3, 100)->get('https://api.aladhan.com/v1/timingsByCity', [
                'city' => $this->defaultCity,
                'country' => $this->defaultCountry,
                'method' => $this->calculationMethod
            ]);
            
            if ($response->successful()) {
                $data = $response->json()['data'];
                
                return (object) [
                    'location' => "{$this->defaultCity}, {$this->defaultCountry}",
                    'date' => $date,
                    'date_hijri' => $data['date']['hijri']['date'] ?? '-',
                    'imsak' => $data['timings']['Imsak'] ?? '-',
                    'subuh' => $data['timings']['Fajr'] ?? '-',
                    'terbit' => $data['timings']['Sunrise'] ?? '-',
                    'dzuhur' => $data['timings']['Dhuhr'] ?? '-',
                    'ashar' => $data['timings']['Asr'] ?? '-',
                    'maghrib' => $data['timings']['Maghrib'] ?? '-',
                    'isya' => $data['timings']['Isha'] ?? '-',
                    'source' => 'api'
                ];
            }
        } catch (\Exception $e) {
            \Log::error('API Prayer Time Error: ' . $e->getMessage());
        }
        
        return null;
    }
    
    private function formatManualData(PrayerTime $prayerTime)
    {
        return (object) [
            'location' => $prayerTime->location ?? "{$this->defaultCity}, {$this->defaultCountry}",
            'date' => $prayerTime->date,
            'date_hijri' => $prayerTime->hijri_date ?? '-',
            'imsak' => $prayerTime->imsak,
            'subuh' => $prayerTime->subuh,
            'terbit' => $prayerTime->terbit ?? '-',
            'dzuhur' => $prayerTime->dzuhur,
            'ashar' => $prayerTime->ashar,
            'maghrib' => $prayerTime->maghrib,
            'isya' => $prayerTime->isya,
            'source' => 'manual'
        ];
    }
    
    private function getFallbackData()
    {
        // Coba ambil data kemarin
        $yesterday = now()->subDay()->toDateString();
        $yesterdayData = PrayerTime::whereDate('date', $yesterday)->first();
        
        if ($yesterdayData) {
            $data = $this->formatManualData($yesterdayData);
            $data->date = now()->toDateString();
            $data->source = 'fallback';
            return $data;
        }
        
        // Default data jika semua gagal
        return (object) [
            'location' => "{$this->defaultCity}, {$this->defaultCountry}",
            'date' => now()->toDateString(),
            'date_hijri' => '-',
            'imsak' => '-',
            'subuh' => '-',
            'terbit' => '-',
            'dzuhur' => '-',
            'ashar' => '-',
            'maghrib' => '-',
            'isya' => '-',
            'source' => 'default'
        ];
    }
    
    // Optional: Method untuk menyimpan jadwal dari API ke database sebagai backup
    public function syncApiToDatabase()
    {
        $today = now()->toDateString();
        
        $prayerTime = $this->fetchFromApi($today);
        
        if ($prayerTime && !PrayerTime::whereDate('date', $today)->exists()) {
            PrayerTime::create([
                'date' => $today,
                'location' => $prayerTime->location,
                'hijri_date' => $prayerTime->date_hijri,
                'imsak' => $prayerTime->imsak,
                'subuh' => $prayerTime->subuh,
                'terbit' => $prayerTime->terbit,
                'dzuhur' => $prayerTime->dzuhur,
                'ashar' => $prayerTime->ashar,
                'maghrib' => $prayerTime->maghrib,
                'isya' => $prayerTime->isya,
                'is_auto' => true
            ]);
        }
        
        return response()->json(['success' => true]);
    }
}