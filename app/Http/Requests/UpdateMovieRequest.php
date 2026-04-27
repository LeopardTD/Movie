<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul'      => 'required|string|max:255',
            'category_id'=> 'required|integer|exists:categories,id',
            'sinopsis'   => 'required|string',
            'tahun'      => 'required|integer',
            'pemain'     => 'required|string',
            'foto_sampul'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
