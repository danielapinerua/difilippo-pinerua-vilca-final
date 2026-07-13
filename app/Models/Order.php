<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Collection;
use App\Enums\OrderStatus;

/**
 * Class Order
 *
 * @property int $id
 * @property int $usuario_id
 * @property string $total
 * @property OrderStatus $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read Usuario $usuario
 * @property-read Collection|OrderItem[] $items
 *
 * @package App\Models
 */
class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'usuario_id',
        'total',
        'status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
    return [
        'status' => OrderStatus::class,
        'total' => 'decimal:2',
        ];
    }

    /**
     * Get the user (usuario) that owns the order.
     *
     * @return BelongsTo<Usuario, Order>
     */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    /**
     * Get the items for the order.
     *
     * @return HasMany<OrderItem>
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
