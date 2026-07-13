<?php

namespace App\Policies;

use App\Models\Usuario;
use App\Models\Wishlist;

class WishlistPolicy
{
    /**
     * Otorgar todos los permisos si el usuario es administrador.
     */
    public function before(Usuario $usuario, string $ability): ?bool
    {
        if ($usuario->es_admin) {
            return true;
        }

        return null;
    }

    public function view(Usuario $usuario, Wishlist $wishlist): bool
    {
        return $usuario->id === $wishlist->usuario_id;
    }

    public function update(Usuario $usuario, Wishlist $wishlist): bool
    {
        return $usuario->id === $wishlist->usuario_id;
    }

    public function delete(Usuario $usuario, Wishlist $wishlist): bool
    {
        return $usuario->id === $wishlist->usuario_id;
    }
}
