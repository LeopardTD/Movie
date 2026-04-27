{{-- Partial: _movie-fields.blade.php
     Variabel: $movie (opsional, untuk mode edit), $categories (wajib) --}}

<div class="mb-3">
    <label for="judul" class="form-label">Judul</label>
    <input type="text" class="form-control @error('judul') is-invalid @enderror"
           id="judul" name="judul" value="{{ old('judul', $movie->judul ?? '') }}" required>
    @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="category_id" class="form-label">Kategori</label>
    <select name="category_id" id="category_id"
            class="form-select @error('category_id') is-invalid @enderror" required>
        <option value="">Pilih Kategori</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $movie->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->nama_kategori }}
            </option>
        @endforeach
    </select>
    @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="sinopsis" class="form-label">Sinopsis</label>
    <textarea class="form-control @error('sinopsis') is-invalid @enderror"
              id="sinopsis" name="sinopsis" rows="4" required>{{ old('sinopsis', $movie->sinopsis ?? '') }}</textarea>
    @error('sinopsis') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="tahun" class="form-label">Tahun</label>
    <input type="number" class="form-control @error('tahun') is-invalid @enderror"
           id="tahun" name="tahun" value="{{ old('tahun', $movie->tahun ?? '') }}" required>
    @error('tahun') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="pemain" class="form-label">Pemain</label>
    <input type="text" class="form-control @error('pemain') is-invalid @enderror"
           id="pemain" name="pemain" value="{{ old('pemain', $movie->pemain ?? '') }}" required>
    @error('pemain') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="foto_sampul" class="form-label">Foto Sampul {{ isset($movie) ? '(Kosongkan jika tidak ingin mengubah)' : '' }}</label>
    @isset($movie)
        <div class="mb-2">
            <img src="/images/{{ $movie->foto_sampul }}" alt="{{ $movie->judul }}"
                 class="img-thumbnail" style="max-height: 120px;">
        </div>
    @endisset
    <input type="file" class="form-control @error('foto_sampul') is-invalid @enderror"
           id="foto_sampul" name="foto_sampul" {{ !isset($movie) ? 'required' : '' }}>
    @error('foto_sampul') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
