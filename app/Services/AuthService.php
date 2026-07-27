<?php
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function attemptLogin(array $credentials, Request $request): bool
    {
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return true;
        }

        return false;
    }

    public function logout(Request $request): void
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    public function registerUser(array $data): Usuario
    {
        return DB::transaction(function () use ($data) {
            $usuario = Usuario::create([
                'nombre' => $data['nombre'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'es_admin' => false
            ]);

            $usuario->addresses()->create([
                'address' => $data['address'],
                'city' => $data['city'],
                'province' => $data['province'],
                'postal_code' => $data['postal_code'],
            ]);

            return $usuario;
        });
    }
}
