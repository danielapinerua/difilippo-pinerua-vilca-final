<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Controlador para Category.
 */
class CategoryController extends Controller
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): View
    {
        $categories = $this->categoryService->getAllCategories();
        return view('categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $this->categoryService->createCategory($request->validated());
        return redirect()->route('categories.index')->with('success', 'Categoría creada con éxito.');
    }

    public function edit(int $id): View
    {
        $category = $this->categoryService->getCategoryById($id);
        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, int $id): RedirectResponse
    {
        $this->categoryService->updateCategory($id, $request->validated());
        return redirect()->route('categories.index')->with('success', 'Categoría actualizada con éxito.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->categoryService->deleteCategory($id);
        return redirect()->route('categories.index')->with('success', 'Categoría eliminada con éxito.');
    }
}
