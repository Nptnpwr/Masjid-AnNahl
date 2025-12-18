<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityAdminController extends Controller
{
    // TAMPILKAN SEMUA KEGIATAN
    public function index()
    {
        $activities = Activity::latest()->paginate(10);
        return view('admin.activities.index', compact('activities'));
    }

    // FORM TAMBAH KEGIATAN
    public function create()
    {
        return view('admin.activities.create');
    }


    // SIMPAN KEGIATAN BARU
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date|unique:activities,date',
            'place' => 'required|string|max:255',
            'type' => 'required|in:rutin,insidental',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', //2MB max
        ]);

        // Simpan gambar jika ada
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('activities', 'public');
        }

        Activity::create($validated);

        return redirect()->route('admin.activities.index')
            ->with('success', 'Kegiatan berhasil ditambahkan!');
    }

    // FORM EDIT KEGIATAN
    public function edit(Activity $activity)
    {
        return view('admin.activities.edit', compact('activity'));
    }


    // UPDATE DATA KEGIATAN
    public function update(Request $request, Activity $activity)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date|unique:activities,date,' . $activity->id,
            'place' => 'required|string|max:255',
            'type' => 'required|in:rutin,insidental',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', //2MB max
        ]);

        // Update gambar jika ada upload baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($activity->image && Storage::exists('public/' . $activity->image)) {
                Storage::delete('public/' . $activity->image);
            }

            // Simpan gambar baru
            $validated['image'] = $request->file('image')->store('activities', 'public');
        }

        $activity->update($validated);

        return redirect()->route('admin.activities.index')
            ->with('success', 'Kegiatan berhasil diperbarui!');
    }

    // HAPUS KEGIATAN
    public function destroy(Activity $activity)
    {
        // Hapus gambar dari storage jika ada
        if ($activity->image && Storage::exists('public/' . $activity->image)) {
            Storage::delete('public/' . $activity->image);
        }

        $activity->delete();

        return redirect()->route('admin.activities.index')
            ->with('success', 'Kegiatan berhasil dihapus!');
    }
}