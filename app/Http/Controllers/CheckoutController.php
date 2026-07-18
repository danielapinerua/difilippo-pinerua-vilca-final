<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutProcessRequest;
use App\Services\CheckoutService;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    protected CheckoutService $checkoutService;

    public function __construct(CheckoutService $checkoutService)
    {
        $this->checkoutService = $checkoutService;
    }

    public function process(CheckoutProcessRequest $request)
    {
        // Validated cart data from the request (injected by prepareForValidation)
        $validated = $request->validated();
        $cart = $validated['cart'];

        try {
            $this->checkoutService->processCheckout(Auth::user(), $cart);
            
            // Redirigir a los pedidos del usuario o inicio con éxito
            return redirect()->route('home')->with('success', 'Orden generada con éxito');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Hubo un error al procesar tu orden. Inténtalo de nuevo más tarde.');
        }
    }
}
