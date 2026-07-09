<?php
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
