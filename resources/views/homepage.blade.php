@extends('layout.template')

@section('title', 'Popular Movie')

@section('content')

<h1 class="mb-4">Popular Movie</h1>

<div class="row">
    @forelse ($movies as $movie)
        @include('partials.movie-card', compact('movie'))
    @empty
        <div class="col-12">
            <p class="text-muted">Tidak ada film ditemukan.</p>
        </div>
    @endforelse
</div>

<div class="d-flex justify-content-center mt-3">
    {{ $movies->links() }}
</div>

@endsection
