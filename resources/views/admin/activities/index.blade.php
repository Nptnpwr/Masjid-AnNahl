@extends('admin.layouts.app')

@section('title', 'Kelola Kegiatan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Kelola Kegiatan</h2>
    <a href="{{ route('admin.activities.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Kegiatan
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($activities->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="25%">Judul</th>
                            <th width="20%">Tanggal</th>
                            <th width="20%">Tempat</th>
                            <th width="15%">Jenis</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activities as $index => $activity)
                            <tr>
                                <td>{{ $activities->firstItem() + $index }}</td>
                                <td>
                                    <strong>{{ $activity->title }}</strong>
                                    <br>
                                    <small class="text-muted">{!! Str::limit($activity->description, 50) !!}</small>
                                </td>
                                <td>
                                    <i class="bi bi-calendar3 text-primary"></i>
                                    {{ \Carbon\Carbon::parse($activity->date)->format('d M Y') }}
                                </td>
                                <td>
                                    <i class="bi bi-geo-alt text-success"></i>
                                    {{ $activity->place }}
                                </td>
                                <td>
                                    <span class="badge bg-{{ $activity->type == 'rutin' ? 'primary' : 'success' }}">
                                        {{ ucfirst($activity->type) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.activities.edit', $activity->id) }}"
                                           class="btn btn-sm btn-warning"
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.activities.destroy', $activity->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $activities->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-inbox" style="font-size: 4rem; color: #cbd5e1;"></i>
                <h5 class="mt-3 text-muted">Belum Ada Kegiatan</h5>
                <p class="text-muted">Klik tombol "Tambah Kegiatan" untuk menambah data pertama</p>
                <a href="{{ route('admin.activities.create') }}" class="btn btn-primary mt-2">
                    <i class="bi bi-plus-circle"></i> Tambah Kegiatan
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
