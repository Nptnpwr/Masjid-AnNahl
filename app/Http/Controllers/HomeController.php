<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\News;
use App\Models\Gallery;
use App\Models\DonationAccount;
use App\Models\PrayerTime;
use App\Models\MasjidProfile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Home page
    public function index()
    {
        $activities = Activity::latest()->take(3)->get();
        $news = News::latest()->take(3)->get();
        $galleries = Gallery::latest()->take(4)->get();
        $prayerTime = PrayerTime::whereDate('date', now())->first();
        
        return view('home', compact('activities', 'news', 'galleries', 'prayerTime'));
    }

    // Profil page
    public function profil()
    {
        $profile = MasjidProfile::first();
        $pengurus = \App\Models\Pengurus::orderBy('urutan', 'asc')->get(); 

        return view('profil', compact('profile', 'pengurus'));
    }

    // Jadwal Sholat page
    public function jadwal()
    {
        $prayerTime = PrayerTime::whereDate('date', now())->first();
        return view('jadwal', compact('prayerTime'));
    }

    // Kegiatan page
    public function kegiatan()
    {
        $activities = Activity::latest()->paginate(9);
        return view('kegiatan', compact('activities'));
    }

    // Berita list page
    public function berita()
    {
        $news = News::latest()->paginate(9);
        return view('berita', compact('news'));
    }

    // Berita detail page
    public function beritaDetail($id)
    {
        $newsItem = News::findOrFail($id);
        $recentNews = News::where('id', '!=', $id)->latest()->take(3)->get();
        return view('news.detail', compact('newsItem', 'recentNews'));
    }

    // Galeri page
    public function galeri()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('galeri', compact('galleries'));
    }

    // Donasi page
    public function donasi()
    {
        $donations = DonationAccount::all();
        return view('donasi', compact('donations'));
    }
}