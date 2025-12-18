<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class NewsAdminController extends Controller
{
    // Display list of news
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    // Show create form
    public function create()
    {
        return view('admin.news.create');
    }

    // Store new news
public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'excerpt' => 'required|string',
        'content' => 'required|string',

    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('news_images', 'public');
    }

    // Tambahkan published_date otomatis
    $validated['published_date'] = now();

    // Simpan ke database
    \App\Models\News::create($validated);

    return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan.');
}

    // Show edit form
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    // Update news
    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
        'title' => 'required',
        'excerpt' => 'required',
        'content' => 'required',
        'published_date' => [
            'required',
            'date',
            Rule::unique('news', 'published_date')->ignore($news->id),
        ],
        'image' => 'nullable|image',
]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $validated['image'] = $request->file('image')->store('news_images', 'public');
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil diupdate!');
    }

    // Delete news
    public function destroy(News $news)
    {
        // Delete image if exists
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus!');
    }
}
