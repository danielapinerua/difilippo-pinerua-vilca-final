<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Models\Product;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        $cartData = $this->cartService->getCart();
        return view('store.cart', [
            'cartItems' => $cartData['items'],
            'cartTotal' => $cartData['total']
        ]);
    }

    public function add(Request $request, Product $product)
    {
        $quantity = (int) $request->input('quantity', 1);
        if ($quantity < 1) {
            $quantity = 1;
        }

        $this->cartService->add($product, $quantity);
        return back()->with('success', 'Producto agregado al carrito');
    }

    public function increment(Product $product)
    {
        $this->cartService->increment($product);
        return back()->with('success', 'Cantidad aumentada');
    }

    public function decrement(Product $product)
    {
        $this->cartService->decrement($product);
        return back()->with('success', 'Cantidad disminuida');
    }

    public function remove(Product $product)
    {
        $this->cartService->remove($product);
        return back()->with('success', 'Producto eliminado del carrito');
    }
}
