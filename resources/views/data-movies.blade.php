@extends('layout.template')

@section('title', 'Data Movie')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Data Movie</h1>
    <a href="{{ route('movies.create') }}" class="btn btn-success">+ Tambah Movie</a>
</div>

<table class="table table-hover table-bordered">
    <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Tahun</th>
            <th>Pemain</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($movies as $movie)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $movie->judul }}</td>
            <td>{{ $movie->category->nama_kategori }}</td>
            <td>{{ $movie->tahun }}</td>
            <td>{{ $movie->pemain }}</td>
            <td class="text-nowrap">
                <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <a href="{{ route('movies.delete', $movie->id) }}" class="btn btn-sm btn-danger"
                   onclick="return confirm('Yakin ingin menghapus film ini?')">Hapus</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center text-muted">Belum ada data film.</td>
        </tr>
        @endforelse
    </tbody>
</table>


<div class="d-flex justify-content-center">
    {{ $movies->links('pagination::bootstrap-5') }}
</div>

@endsection
