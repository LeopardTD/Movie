@extends('layout.template')

@section('title', 'Tambah Movie')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Tambah Movie Baru</h2>
            <a href="{{ route('movies.data') }}" class="btn btn-secondary">List Movie</a>
        </div>

        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">ID Film</label>
                <input type="text" class="form-control @error('id') is-invalid @enderror"
                       id="id" name="id" value="{{ old('id') }}" required>
                @error('id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            @include('partials.movie-fields', ['categories' => $categories])

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@endsection
