<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Enums\OrderStatus;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function createOrder($usuarioId, $items)
    {
        return DB::transaction(function () use ($usuarioId, $items) {

            $total = 0;

            // calcular total
            foreach ($items as $item) {
                $total += $item['unit_price'] * $item['quantity'];
            }

            // crear orden
            $order = Order::create([
                'usuario_id' => $usuarioId,
                'total' => $total,
                'status' => OrderStatus::PENDIENTE,
            ]);

            // crear items
            foreach ($items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'unit_price' => $item['unit_price'],
                    'quantity' => $item['quantity'],
                ]);
            }

            return $order;
        });
    }
}