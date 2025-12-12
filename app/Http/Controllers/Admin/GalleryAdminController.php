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
        'title' => 'required',
        'image' => 'nullable|image|max:2048',
        'video' => 'nullable|mimes:mp4,avi,mov,wmv|max:51200',
    ]);

    $data = ['title' => $request->title];

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('galleries/images', 'public');
    }

    if ($request->hasFile('video')) {
        $data['video'] = $request->file('video')->store('galleries/videos', 'public');
    }

    Gallery::create($data);

    return redirect()->route('admin.galleries.index')
        ->with('success', 'Galeri berhasil ditambahkan');
}

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }
   public function update(Request $request, Gallery $gallery)
{
    $request->validate([
        'title' => 'required',
        'image' => 'nullable|image|max:2048',
        'video' => 'nullable|mimes:mp4,avi,mov,wmv|max:51200',
    ]);

    $data = ['title' => $request->title];

    // Jika upload image baru
    if ($request->hasFile('image')) {
        // Hapus image lama jika ada
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }
        // Hapus video lama jika ada (karena diganti dengan image)
        if ($gallery->video) {
            Storage::disk('public')->delete($gallery->video);
        }
        
        $data['image'] = $request->file('image')->store('galleries/images', 'public');
        $data['video'] = null; // Set video jadi null
    }

    // Jika upload video baru
    if ($request->hasFile('video')) {
        // Hapus video lama jika ada
        if ($gallery->video) {
            Storage::disk('public')->delete($gallery->video);
        }
        // Hapus image lama jika ada (karena diganti dengan video)
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }
        
        $data['video'] = $request->file('video')->store('galleries/videos', 'public');
        $data['image'] = null; // Set image jadi null
    }

    $gallery->update($data);

    return redirect()->route('admin.galleries.index')
        ->with('success', 'Galeri berhasil diupdate');
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
