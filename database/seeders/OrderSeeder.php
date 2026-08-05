<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Usuario;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        // Buscar el usuario existente (como se solicitó)
        $cliente = Usuario::where('email', 'cliente@gmail.com')->first();
        
        if (!$cliente) {
            return;
        }

        // Obtener productos reales para asignar
        $products = Product::all();
        if ($products->isEmpty()) {
            return;
        }

        // Crear 30 pedidos usando el factory con distintos estados
        Order::factory(30)
            ->create(['usuario_id' => $cliente->id])
            ->each(function ($order) use ($products) {
                // Cantidad aleatoria de ítems por pedido
                $numItems = rand(1, 4);
                $selectedProducts = $products->random($numItems);
                $total = 0;

                foreach ($selectedProducts as $product) {
                    $quantity = rand(1, 3);
                    $unitPrice = $product->price;
                    $subtotal = $quantity * $unitPrice;

                    // Crear el detalle forzando los valores reales del producto
                    OrderItem::factory()->create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $quantity,
                        'unit_price' => $unitPrice,
                    ]);

                    $total += $subtotal;
                }

                // Actualizar total exacto de la orden basándose en sus ítems
                $order->update(['total' => $total]);
            });
    }
}
