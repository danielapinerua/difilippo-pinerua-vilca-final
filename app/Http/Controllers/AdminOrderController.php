<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Services\OrderService;
use App\Enums\OrderStatus;
use App\Http\Requests\UpdateOrderStatusRequest;

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
        $order->load(['usuario.addresses', 'items.product']);
        return view('admin.orders.show', compact('order'));
    }

    public function update(UpdateOrderStatusRequest $request, Order $order)
    {
        try {
            $this->orderService->updateStatus($order, $request->status);
            
            $message = strtolower($request->status) === 'cancelado' 
                ? 'El pedido ha sido cancelado con éxito.' 
                : 'Estado del pedido actualizado correctamente.';

            return redirect()->route('admin.orders.show', $order->id)->with('success', $message);
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('admin.orders.show', $order->id)->with('error', $e->getMessage());
        }
    }
    public function cancel(Order $order)
    {
        return view('admin.orders.cancel', compact('order'));
    }
}
