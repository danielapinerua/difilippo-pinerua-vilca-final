<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Enums\OrderStatus;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

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

    public function updateStatus(Order $order, string $newStatus)
    {
        $currentStatus = $order->status->value;

        $isValid = match ($currentStatus) {
            OrderStatus::PENDIENTE->value => in_array($newStatus, [OrderStatus::PAGADO->value, OrderStatus::CANCELADO->value]),
            OrderStatus::PAGADO->value => in_array($newStatus, [OrderStatus::ENVIADO->value, OrderStatus::CANCELADO->value]),
            OrderStatus::ENVIADO->value => $newStatus === OrderStatus::ENTREGADO->value,
            OrderStatus::ENTREGADO->value, OrderStatus::CANCELADO->value => false,
            default => false,
        };

        if (!$isValid) {
            throw new InvalidArgumentException('Transición de estado no permitida.');
        }

        $order->status = OrderStatus::from($newStatus);
        $order->save();

        return $order;
    }
}