<?php

namespace App\Http\Controllers;

use App\Services\MovieService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class MovieController extends Controller
{
    public function __construct(protected MovieService $movieService) {}

    public function index()
    {
        $movies = $this->movieService->getMoviesForHomepage(request('search'));
        return view('homepage', compact('movies'));
    }

    public function detail(string $id)
    {
        $movie = $this->movieService->findMovie($id);
        return view('detail', compact('movie'));
    }

    public function create()
    {
        $categories = $this->movieService->getAllCategories();
        return view('input', compact('categories'));
    }

    public function store(StoreMovieRequest $request)
    {
        $this->movieService->saveMovie(
            $request->validated(),
            $request->file('foto_sampul')
        );

        return redirect('/')->with('success', 'Film berhasil ditambahkan');
    }

    public function data()
    {
        $movies = $this->movieService->getMoviesForAdmin();
        return view('data-movies', compact('movies'));
    }

    public function editForm(string $id)
    {
        $movie      = $this->movieService->findMovie($id);
        $categories = $this->movieService->getAllCategories();
        return view('form-edit', compact('movie', 'categories'));
    }

    public function update(UpdateMovieRequest $request, string $id)
    {
        $this->movieService->updateMovie(
            $id,
            $request->validated(),
            $request->file('foto_sampul')
        );

        return redirect('/movies/data')->with('success', 'Data berhasil diperbarui');
    }

    public function delete(string $id)
    {
        $this->movieService->deleteMovie($id);
        return redirect('/movies/data')->with('success', 'Data berhasil dihapus');
    }
}
