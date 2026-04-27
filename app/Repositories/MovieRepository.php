<?php

namespace App\Repositories;

use App\Models\Movie;
use App\Interfaces\MovieRepositoryInterface;

class MovieRepository implements MovieRepositoryInterface
{
    public function __construct(protected Movie $movie) {}

    public function getAllPaginated(int $perPage, ?string $search)
    {
        $query = $this->movie->latest();

        if ($search) {
            $query->where('judul', 'like', "%{$search}%")
                  ->orWhere('sinopsis', 'like', "%{$search}%");
        }

        return $query->paginate($perPage)->withQueryString();
    }

    public function findById(string $id)
    {
        return $this->movie->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->movie->create($data);
    }

    public function update(string $id, array $data)
    {
        $movie = $this->findById($id);
        $movie->update($data);
        return $movie;
    }

    public function delete(string $id)
    {
        $movie = $this->findById($id);
        $movie->delete();
        return $movie;
    }

    public function getAllPaginatedForAdmin(int $perPage)
    {
        return $this->movie->latest()->paginate($perPage);
    }
}
