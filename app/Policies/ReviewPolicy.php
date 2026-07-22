<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\Usuario;
use Illuminate\Auth\Access\Response;

class ReviewPolicy
{
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Usuario $usuario, Review $review): bool
    {
        return $usuario->id === $review->usuario_id || $usuario->es_admin;
    }
}
