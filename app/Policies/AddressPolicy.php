<?php

namespace App\Policies;

use App\Models\Address;
use App\Models\Usuario;

class AddressPolicy
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

    public function view(Usuario $usuario, Address $address): bool
    {
        return $usuario->id === $address->usuario_id;
    }

    public function update(Usuario $usuario, Address $address): bool
    {
        return $usuario->id === $address->usuario_id;
    }

    public function delete(Usuario $usuario, Address $address): bool
    {
        return $usuario->id === $address->usuario_id;
    }
}
