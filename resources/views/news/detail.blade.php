@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-3">{{ $newsItem->title }}</h1>

    <p class="text-muted">
        <i class="bi bi-calendar3"></i>
        {{ \Carbon\Carbon::parse($newsItem->published_date)->format('d F Y') }}
    </p>

    @if ($newsItem->image)
        <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{!! $newsItem->title !!}" class="img-fluid mb-4 rounded">
    @endif

    <p>{!! $newsItem->content !!}</p>

    <hr>
    <h4 class="mt-5">Berita Lainnya</h4>
    <div class="row">
        @foreach ($recentNews as $item)
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <small class="text-muted">
                            {{ \Carbon\Carbon::parse($item->published_date)->format('d F Y') }}
                        </small>
                        <p class="card-text mt-2">{{ Str::limit($item->excerpt, 100) }}</p>
                        <a href="{{ route('berita.detail', $item->id) }}" class="btn btn-outline-primary btn-sm">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
