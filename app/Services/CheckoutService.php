<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use App\Models\Usuario;
use App\Enums\OrderStatus;
use Illuminate\Support\Facades\DB;
use Exception;

class CheckoutService
{
    protected $orderItemService;

    public function __construct(OrderItemService $orderItemService)
    {
        $this->orderItemService = $orderItemService;
    }

    /**
     * Process checkout to convert cart into a real order.
     *
     * @param Usuario $usuario
     * @param array $cart
     * @return Order
     * @throws Exception
     */
    public function processCheckout(Usuario $usuario, array $cart)
    {
        DB::beginTransaction();

        try {
            // Paso A: Calculate total securely and create order
            $total = 0;
            $productIds = array_keys($cart);
            
            // Bloquear las filas de los productos involucrados para evitar race conditions
            $products = Product::whereIn('id', $productIds)->lockForUpdate()->get()->keyBy('id');

            foreach ($cart as $productId => $details) {
                if (!$products->has($productId)) {
                    throw new Exception("El producto con ID {$productId} ya no está disponible.");
                }

                $product = $products->get($productId);
                $quantity = $details['quantity'];

                if ($product->stock < $quantity) {
                    throw new Exception("Stock insuficiente para el producto: {$product->name}");
                }

                $total += $product->price * $quantity;
                
                // Descontar el stock
                $product->stock -= $quantity;
                $product->save();
            }

            $order = Order::create([
                'usuario_id' => $usuario->id,
                'total' => $total,
                'status' => OrderStatus::PENDIENTE,
            ]);

            // Paso B: Los Items
            $this->orderItemService->processCartItems($order, $cart);

            // Paso C: Commit y Limpieza
            DB::commit();
            session()->forget('cart');
            
            return $order;

        } catch (Exception $e) {
            // Paso D: Rollback
            DB::rollBack();
            throw $e;
        }
    }
}
