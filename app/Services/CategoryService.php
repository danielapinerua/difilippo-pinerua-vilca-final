<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function getAllCategories(): Collection
    {
        return Category::withTrashed()->get();
    }

    public function createCategory(array $data): Category
    {
        return Category::create($data);
    }

    public function updateCategory(Category $category, array $data): Category
    {
        $category->update($data);
        
        return $category;
    }

    public function deleteCategory(Category $category): void
    {
        $category->delete();
    }

    public function restoreCategory(Category $category): void
    {
        $category->restore();
    }
}
