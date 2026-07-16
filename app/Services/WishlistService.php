<?php

namespace App\Services;

use App\Models\Usuario;
use App\Models\Product;

class WishlistService
{
    /**
     * Toggles a product in the user's wishlist.
     *
     * @param Usuario $usuario
     * @param Product $product
     * @return void
     */
    public function toggleFavorite(Usuario $usuario, Product $product)
    {
        $usuario->wishlists()->toggle($product->id);
    }

    /**
     * Removes a product from the user's wishlist explicitly.
     *
     * @param Usuario $usuario
     * @param Product $product
     * @return void
     */
    public function removeFavorite(Usuario $usuario, Product $product)
    {
        $usuario->wishlists()->detach($product->id);
    }

    /**
     * Gets the user's wishlist products.
     *
     * @param Usuario $usuario
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUserWishlist(Usuario $usuario)
    {
        return $usuario->wishlists;
    }
}