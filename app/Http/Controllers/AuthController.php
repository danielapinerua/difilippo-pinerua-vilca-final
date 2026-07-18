<?php
namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if ($this->authService->attemptLogin($credentials, $request)) {
            
            if (Auth::user()->es_admin) {
                return redirect()->intended(route('admin.dashboard'));
            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        $this->authService->logout($request);

        return redirect('/');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        Log::info('llego aca');

        $user = $this->authService->registerUser($request->validated());

        Log::info('Usuario registrado:', ['user' => $user]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Cuenta creada exitosamente');
    }
}
