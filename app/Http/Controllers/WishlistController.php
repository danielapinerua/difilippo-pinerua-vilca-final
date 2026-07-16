<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WishlistService;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    protected $wishlistService;

    public function __construct(WishlistService $wishlistService)
    {
        $this->wishlistService = $wishlistService;
    }

    public function index()
    {
        $wishlist = $this->wishlistService->getUserWishlist(Auth::user());
        return view('store.wishlist', compact('wishlist'));
    }

    public function toggle(Product $product)
    {
        $this->wishlistService->toggleFavorite(Auth::user(), $product);
        return back();
    }

    public function destroy(Product $product)
    {
        $this->wishlistService->removeFavorite(Auth::user(), $product);
        return back();
    }
}