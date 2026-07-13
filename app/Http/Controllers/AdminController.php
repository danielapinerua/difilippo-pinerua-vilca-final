<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Usuario;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $stats = [
            'categories' => Category::count(),
            'products' => Product::count(),
            'users' => Usuario::count(),
        ];

        return view('dashboard_admin.index', compact('stats'));
    }
}