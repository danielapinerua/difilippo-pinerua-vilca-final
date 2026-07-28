<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;
use App\Models\Usuario;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        // Buscar usuarios
        $admin = Usuario::where('email', 'admin@gmail.com')->first();
        $cliente = Usuario::where('email', 'cliente@gmail.com')->first();

        // Dirección del admin
        Address::create([
            'usuario_id' => $admin->id,
            'address' => 'Calle Admin 123',
            'city' => 'Ciudad de Buenos Aires',
            'province' => 'Buenos Aires',
            'postal_code' => '1000'
        ]);

        // Dirección del cliente
        Address::create([
            'usuario_id' => $cliente->id,
            'address' => 'Av Siempre Viva 742',
            'city' => 'Ciudad de Córdoba',
            'province' => 'Córdoba',
            'postal_code' => '5000'
        ]);
    }
}