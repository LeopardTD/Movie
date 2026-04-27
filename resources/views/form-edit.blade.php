@extends('layout.template')

@section('title', 'Edit Movie')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <h2 class="mb-4">Edit Movie</h2>

        <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">ID Film</label>
                <input type="text" class="form-control" value="{{ $movie->id }}" disabled>
            </div>

            @include('partials.movie-fields', ['categories' => $categories, 'movie' => $movie])

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('movies.data') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection
