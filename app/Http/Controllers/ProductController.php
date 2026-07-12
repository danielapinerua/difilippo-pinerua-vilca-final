<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $this->productService->createProduct($request->validated());
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = $this->productService->getProductById($id);
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $this->productService->updateProduct($id, $request->validated());
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return redirect()->route('products.index');
    }
}
