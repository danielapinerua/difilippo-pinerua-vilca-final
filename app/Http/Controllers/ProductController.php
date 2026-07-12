<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

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
        $data = $request->validated();
        // 👉 si hay imagen
        if ($request->hasFile('image')) {
        $path = $request->file('image')->store('products', 'public');
        $data['image'] = $path;
        }
        $this->productService->createProduct($data);
        return redirect()->route('products.index');
        }

    public function edit($id)
    {
        $product = $this->productService->getProductById($id);
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;
            }
            $this->productService->updateProduct($id, $data);
            return redirect()->route('products.index');
            }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return redirect()->route('products.index');
    }
}
