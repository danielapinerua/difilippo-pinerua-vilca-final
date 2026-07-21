<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Services\OrderService;
use App\Enums\OrderStatus;

class AdminOrderController extends Controller
{
    protected OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = Order::with('usuario')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load(['usuario', 'items.product']);
        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        try {
            $this->orderService->updateStatus($order, $request->status);
            return back()->with('success', 'Estado del pedido actualizado correctamente.');
        } catch (\InvalidArgumentException $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
