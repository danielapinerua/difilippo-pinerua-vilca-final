<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Usuario;
use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'usuario_id' => 1,
            'total' => 0,
            'status' => $this->faker->randomElement([
                OrderStatus::PENDIENTE,
                OrderStatus::PAGADO,
                OrderStatus::ENVIADO,
                OrderStatus::ENTREGADO,
                OrderStatus::CANCELADO,
            ]),
            'created_at' => $this->faker->dateTimeBetween('-2 months', 'now'),
            'updated_at' => function (array $attributes) {
                return $this->faker->dateTimeBetween($attributes['created_at'], 'now');
            },
        ];
    }
}
