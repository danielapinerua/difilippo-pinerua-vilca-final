<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function catalog()
    {
        $products = Product::all();
        return view('store.catalog', compact('products'));
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