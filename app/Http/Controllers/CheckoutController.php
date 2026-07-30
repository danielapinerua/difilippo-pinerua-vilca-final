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
            $order = $this->checkoutService->processCheckout(Auth::user(), $cart);
            
            return redirect()->route('checkout.success', $order->id);
            
        } catch (\Exception $e) {
            return back()->with('error', 'Hubo un error al procesar tu orden. Inténtalo de nuevo más tarde.');
        }
    }

    public function success(\App\Models\Order $order)
    {
        if (Auth::id() !== $order->usuario_id) {
            abort(403, 'No tienes permiso para ver este pedido.');
        }

        return view('store.checkout-success', compact('order'));
    }
}
