<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        // 🔹 CATEGORÍAS
        $categories = Category::all();

        // 🔹 QUERY
        $query = Product::with('categories');

        // 🔹 FILTRO
        if ($request->category) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        // 🔹 FILTRO POR PRECIO
        if ($request->price) {
            if ($request->price == 'low') {
                $query->where('price', '<', 2000);
                } elseif ($request->price == 'mid') {
                    $query->whereBetween('price', [2000, 4000]);
                    } elseif ($request->price == 'high') {
                        $query->where('price', '>', 4000);
                        }
                    }

        // 🔹 PRODUCTOS
        $products = $query->paginate(15);

        return view('store.catalog', compact('products', 'categories'));
    }
}