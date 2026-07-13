<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\Usuario;

class ReviewPolicy
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

    public function view(Usuario $usuario, Review $review): bool
    {
        return $usuario->id === $review->usuario_id;
    }

    public function update(Usuario $usuario, Review $review): bool
    {
        return $usuario->id === $review->usuario_id;
    }

    public function delete(Usuario $usuario, Review $review): bool
    {
        return $usuario->id === $review->usuario_id;
    }
}
