<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use InvalidArgumentException;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(Request $request)
    {
        $order = $this->orderService->createOrder(
            Auth::id(),
            $request->items
        );

        return response()->json($order);
    }

    public function updateStatus(Request $request, Order $order)
    {
        try {
            $this->orderService->updateStatus($order, $request->input('status'));
            return back()->with('success', 'Estado actualizado correctamente.');
        } catch (InvalidArgumentException $e) {
            return back()->withErrors(['status' => $e->getMessage()]);
        }
    }
}