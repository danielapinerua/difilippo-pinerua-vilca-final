<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;

/**
 * Class Usuario
 *
 * @property int $id
 * @property string $nombre
 * @property string $email
 * @property string $password
 * @property bool $es_admin
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read Collection|Order[] $orders
 * @property-read Collection|Review[] $reviews
 * @property-read Collection|Wishlist[] $wishlists
 * @property-read Collection|Address[] $addresses
 *
 * @package App\Models
 */
class Usuario extends Authenticatable
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'es_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'es_admin' => 'boolean',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the orders for the usuario.
     *
     * @return HasMany<Order>
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the reviews for the usuario.
     *
     * @return HasMany<Review>
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the wishlist products for the usuario.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function wishlists()
    {
        return $this->belongsToMany(Product::class, 'wishlists');
    }

    /**
     * Check if the user has favorited a specific product.
     *
     * @param Product $product
     * @return bool
     */
    public function hasFavorited(Product $product): bool
    {
        return $this->wishlists()->where('product_id', $product->id)->exists();
    }

    /**
     * Get the addresses for the usuario.
     *
     * @return HasMany<Address>
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }
}
