<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getAllProducts()
    {
        return Product::with('categories')->get();
    }

    public function createProduct($data)
    {
        $product = Product::create($data);
        if (isset($data['categories'])) {
            $product->categories()->attach($data['categories']);
        }
        return $product;
    }

    public function updateProduct(Product $product, array $data): Product
    {
        $product->update($data);
        if (isset($data['categories'])) {
            $product->categories()->sync($data['categories']);
        }
        return $product;
    }

    public function deleteProduct(Product $product): void
    {
        $product->delete();
    }
}