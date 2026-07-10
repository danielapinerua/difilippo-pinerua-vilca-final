<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function getAllCategories(): Collection
    {
        return Category::all();
    }

    public function createCategory(array $data): Category
    {
        return Category::create($data);
    }

    public function getCategoryById(int $id): Category
    {
        return Category::findOrFail($id);
    }

    public function updateCategory(int $id, array $data): Category
    {
        $category = $this->getCategoryById($id);
        $category->update($data);
        
        return $category;
    }

    public function deleteCategory(int $id): void
    {
        $category = $this->getCategoryById($id);
        $category->delete($id);
    }
}
