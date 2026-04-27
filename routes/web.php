<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/',                      [MovieController::class, 'index'])->name('home');
Route::get('/movie/{id}',            [MovieController::class, 'detail'])->name('movies.detail');
Route::get('/movies/create',         [MovieController::class, 'create'])->name('movies.create');
Route::post('/movies/store',         [MovieController::class, 'store'])->name('movies.store');
Route::get('/movies/data',           [MovieController::class, 'data'])->name('movies.data');
Route::get('/movies/edit/{id}',      [MovieController::class, 'editForm'])->name('movies.edit');
Route::post('/movies/{id}/update',   [MovieController::class, 'update'])->name('movies.update');
Route::get('/movies/delete/{id}',    [MovieController::class, 'delete'])->name('movies.delete');
