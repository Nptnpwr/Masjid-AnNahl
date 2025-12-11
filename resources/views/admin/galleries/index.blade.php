@extends('admin.layouts.app')

@section('title', 'Kelola Galeri')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Kelola Galeri</h2>
    <a href="{{ route('admin.galleries.create') }}" class="btn btn-warning">
        <i class="bi bi-plus-circle"></i> Tambah Galeri
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($galleries->count() > 0)
            <div class="row g-3">
                @foreach($galleries as $gallery)
                    <div class="col-md-3">
                        <div class="card h-100">

                            @php
                                 $media = $gallery->image ?? $gallery->video;

                                $ext = strtolower(pathinfo($media, PATHINFO_EXTENSION));

                                $isImage = in_array($ext, ['jpg','jpeg','png','gif','webp']);
                                $isVideo = in_array($ext, ['mp4','mov','avi','mkv','webm']);
                            @endphp

                            @if ($isImage && $gallery->image)
                                <img src="{{ Storage::url($gallery->image) }}" 
                                    class="card-img-top"
                                    style="height:200px; object-fit:cover;">
                            @elseif ($isVideo && $gallery->video)
                                <video controls class="w-100" style="height:200px; object-fit:cover;">
                                    <source src="{{ Storage::url($gallery->video) }}" type="video/mp4">
                                </video>
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" 
                                    style="height: 200px;">
                                    <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                </div>
                            @endif

                            <div class="card-body">
                                <h6 class="card-title">{{ $gallery->title }}</h6>
                                <small class="text-muted">
                                    <i class="bi bi-calendar3"></i>
                                    {{ $gallery->created_at->format('d M Y') }}
                                </small>
                            </div>
                            <div class="card-footer bg-white border-top">
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('admin.galleries.edit', $gallery->id) }}" 
                                       class="btn btn-sm btn-warning flex-fill">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" 
                                          method="POST" 
                                          class="flex-fill"
                                          onsubmit="return confirm('Yakin ingin menghapus galeri ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger w-100">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $galleries->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-inbox" style="font-size: 4rem; color: #cbd5e1;"></i>
                <h5 class="mt-3 text-muted">Belum Ada Galeri</h5>
                <p class="text-muted">Klik tombol "Tambah Galeri" untuk menambah foto pertama</p>
                <a href="{{ route('admin.galleries.create') }}" class="btn btn-warning mt-2">
                    <i class="bi bi-plus-circle"></i> Tambah Galeri
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
