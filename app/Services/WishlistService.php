<?php

namespace App\Services;

use App\Models\Wishlist;

class WishlistService
{
    public function getByUser(int $usuarioId)
    {
        return Wishlist::with('product')
            ->where('usuario_id', $usuarioId)
            ->get();
    }

    public function add(int $usuarioId, int $productId)
    {
        $exists = Wishlist::where('usuario_id', $usuarioId)
            ->where('product_id', $productId)
            ->exists();

        if ($exists) {
            return [
                'success' => false,
                'message' => 'El producto ya está en la wishlist'
            ];
        }

        $wishlist = Wishlist::create([
            'usuario_id' => $usuarioId,
            'product_id' => $productId
        ]);

        return [
            'success' => true,
            'data' => $wishlist
        ];
    }

    public function remove(int $usuarioId, int $productId)
    {
        $deleted = Wishlist::where('usuario_id', $usuarioId)
            ->where('product_id', $productId)
            ->delete();

        if ($deleted) {
            return [
                'success' => true,
                'message' => 'Producto eliminado de la wishlist'
            ];
        }

        return [
            'success' => false,
            'message' => 'No se encontró el producto en la wishlist'
        ];
    }
}