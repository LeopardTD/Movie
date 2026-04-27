<div class="col-lg-6 mb-3">
    <div class="card h-100">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/images/{{ $movie->foto_sampul }}"
                     class="img-fluid rounded-start h-100 object-fit-cover"
                     alt="{{ $movie->judul }}">
            </div>
            <div class="col-md-8">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $movie->judul }}</h5>
                    <p class="card-text text-muted small">{{ Str::limit($movie->sinopsis, 120) }}</p>
                    <a href="{{ route('movies.detail', $movie->id) }}"
                       class="btn btn-success mt-auto">Lihat Selanjutnya</a>
                </div>
            </div>
        </div>
    </div>
</div>
