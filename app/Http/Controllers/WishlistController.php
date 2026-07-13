<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WishlistService;

class WishlistController extends Controller
{
    protected $wishlistService;

    public function __construct(WishlistService $wishlistService)
    {
        $this->wishlistService = $wishlistService;
    }

    // Obtener wishlist del usuario
    public function index($usuarioId)
    {
        $wishlist = $this->wishlistService->getByUser($usuarioId);

        return response()->json([
            'success' => true,
            'data' => $wishlist
        ]);
    }

    // Agregar producto a wishlist
    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|integer',
            'product_id' => 'required|integer',
        ]);

        $result = $this->wishlistService->add(
            $request->usuario_id,
            $request->product_id
        );

        return response()->json($result);
    }

    // Eliminar producto de wishlist
    public function destroy($usuarioId, $productId)
    {
        $result = $this->wishlistService->remove($usuarioId, $productId);

        return response()->json($result);
    }
}