<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Interfaces\MovieRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;

class MovieService
{
    public function __construct(
        protected MovieRepositoryInterface    $movieRepository,
        protected CategoryRepositoryInterface $categoryRepository
    ) {}

    public function getMoviesForHomepage(?string $search)
    {
        return $this->movieRepository->getAllPaginated(6, $search);
    }

    public function getMoviesForAdmin()
    {
        return $this->movieRepository->getAllPaginatedForAdmin(10);
    }

    public function findMovie(string $id)
    {
        return $this->movieRepository->findById($id);
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->getAll();
    }

    public function saveMovie(array $validatedData, $coverFile): void
    {
        $validatedData['foto_sampul'] = $this->uploadCover($coverFile);
        $this->movieRepository->create($validatedData);
    }

    public function updateMovie(string $id, array $data, $newCoverFile = null): void
    {
        $movie = $this->movieRepository->findById($id);

        if ($newCoverFile) {
            $this->deleteOldCover($movie->foto_sampul);
            $data['foto_sampul'] = $this->uploadCover($newCoverFile);
        }

        $this->movieRepository->update($id, $data);
    }

    public function deleteMovie(string $id): void
    {
        $movie = $this->movieRepository->findById($id);
        $this->deleteOldCover($movie->foto_sampul);
        $this->movieRepository->delete($id);
    }

    private function uploadCover($file): string
    {
        $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $fileName);
        return $fileName;
    }

    private function deleteOldCover(string $fileName): void
    {
        $path = public_path("images/{$fileName}");
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
