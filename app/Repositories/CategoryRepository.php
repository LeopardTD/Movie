<?php

namespace App\Repositories;

use App\Models\Category;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function __construct(protected Category $category) {}

    public function getAll()
    {
        return $this->category->all();
    }
}
