<?php
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
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
        return Usuario::create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'es_admin' => false
        ]);
    }
}
