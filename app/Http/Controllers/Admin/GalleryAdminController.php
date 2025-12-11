<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryAdminController extends Controller
{
    /**
     * Tampilkan semua galeri
     */
    public function index()
    {
        $galleries = Gallery::latest()->paginate(8);
        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Tampilkan form tambah galeri
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Simpan galeri baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:4096',
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:204800'
        ]);

        $gallery = new Gallery();

        // Upload gambar
        if ($request->hasFile('image')) {
            $gallery->image = $request->file('image')->store('galleries', 'public');
        }

        // Upload video
        if ($request->hasFile('video')) {
             $videoName = time() . '.' . $request->video->extension();
            $gallery->video = $request->file('video')->store('videos', 'public');

            $gallery->video = $videoName;

        }

        $gallery->title = $request->title ?? null;
        $gallery->save();

        return back()->with('success', 'Gallery berhasil ditambahkan!');
    }

    /**
     * Form edit
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update data galeri (gambar + video)
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:4096',
            'video' => 'nullable|mimes:mp4,mov,avi,webm|max:500000',
        ]);

        // === UPDATE GAMBAR ===
        if ($request->hasFile('image')) {
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }

            $gallery->image = $request->file('image')->store('galleries', 'public');
        }

        // === UPDATE VIDEO ===
        if ($request->hasFile('video')) {
            if ($gallery->video && Storage::disk('public')->exists($gallery->video)) {
                Storage::disk('public')->delete($gallery->video);
            }

            $gallery->video = $request->file('video')->store('videos', 'public');
        }

        $gallery->title = $request->title ?? $gallery->title;
        $gallery->save();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Galeri berhasil diperbarui!');
    }

    /**
     * Hapus galeri (gambar + video)
     */
    public function destroy(Gallery $gallery)
    {
        // Hapus gambar
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        // Hapus video
        if ($gallery->video && Storage::disk('public')->exists($gallery->video)) {
            Storage::disk('public')->delete($gallery->video);
        }

        // Hapus row database
        $gallery->delete();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Galeri berhasil dihapus!');
    }
}
