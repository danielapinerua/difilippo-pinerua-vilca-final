<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\Usuario;

class OrderPolicy
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

    public function view(Usuario $usuario, Order $order): bool
    {
        return $usuario->id === $order->usuario_id;
    }

    public function update(Usuario $usuario, Order $order): bool
    {
        return $usuario->id === $order->usuario_id;
    }

    public function delete(Usuario $usuario, Order $order): bool
    {
        return $usuario->id === $order->usuario_id;
    }
}
