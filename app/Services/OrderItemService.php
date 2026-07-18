<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderItemService
{
    /**
     * Process cart items and create order items for a given order.
     *
     * @param Order $order
     * @param array $cartItems
     * @return void
     * @throws \Exception
     */
    public function processCartItems(Order $order, array $cartItems)
    {
        $productIds = array_keys($cartItems);
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

        foreach ($cartItems as $productId => $details) {
            if (!$products->has($productId)) {
                throw new \Exception("El producto con ID {$productId} ya no existe.");
            }

            $product = $products->get($productId);
            $quantity = $details['quantity'];

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'unit_price' => $product->price,
                'quantity' => $quantity,
            ]);
        }
    }
}
