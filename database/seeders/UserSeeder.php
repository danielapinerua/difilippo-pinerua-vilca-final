<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create([
            'nombre' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1111'),
            'es_admin' => 1,
        ]);

        Usuario::create([
            'nombre' => 'Usuario',
            'email' => 'cliente@gmail.com',
            'password' => Hash::make('1111'),
            'es_admin' => 0,
        ]);
    }
}
