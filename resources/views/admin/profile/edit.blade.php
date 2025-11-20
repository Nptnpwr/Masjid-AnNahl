@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Edit Profil Masjid</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card p-4 mb-4">
            <h4>Hero Section</h4>
            <input type="text" name="hero_subtitle" class="form-control" value="{{ $profile->hero_subtitle ?? '' }}">
        </div>

        <div class="card p-4 mb-4">
            <h4>Tentang Masjid</h4>

            <label>Gambar Tentang</label>
            <input type="file" name="about_image" class="form-control mb-3">

            @if(!empty($profile->about_image))
                <img src="{{ asset('storage/' . $profile->about_image) }}" class="img-fluid mb-3" width="200">
            @endif

            <textarea name="about_text_1" class="form-control mb-3" rows="4">{{ $profile->about_text_1 ?? '' }}</textarea>
            <textarea name="about_text_2" class="form-control" rows="4">{{ $profile->about_text_2 ?? '' }}</textarea>
        </div>

        <div class="card p-4 mb-4">
            <h4>Visi & Misi</h4>

            <textarea name="visi" class="form-control mb-3" rows="3">{{ $profile->visi ?? '' }}</textarea>
            <textarea name="misi" class="form-control" rows="3">{{ $profile->misi ?? '' }}</textarea>
        </div>

        <div class="card p-4 mb-4">
            <h4>Statistik Masjid</h4>

            <input type="number" name="capacity" class="form-control mb-2" value="{{ $profile->capacity ?? '' }}">
            <input type="number" name="year" class="form-control mb-2" value="{{ $profile->year ?? '' }}">
            <input type="text" name="routine_activities" class="form-control mb-2" value="{{ $profile->routine_activities ?? '' }}">
            <input type="text" name="public_info" class="form-control" value="{{ $profile->public_info ?? '' }}">
        </div>

        <div class="card p-4 mb-4">
            <h4>Kontak</h4>
            <input type="text" name="whatsapp" class="form-control" value="{{ $profile->whatsapp ?? '' }}">
        </div>

        <button class="btn btn-primary w-100">Simpan Perubahan</button>
    </form>
</div>
@endsection