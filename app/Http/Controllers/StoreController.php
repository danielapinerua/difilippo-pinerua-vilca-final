<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function catalog(Request $request)
    {
        $query = Product::query();

        if ($request->filled('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        $products = $query->paginate(15);
        $categories = Category::all();

        return view('store.catalog', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        $relatedProducts = Product::where('id', '!=', $product->id)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('store.show', compact('product', 'relatedProducts'));
    }
}