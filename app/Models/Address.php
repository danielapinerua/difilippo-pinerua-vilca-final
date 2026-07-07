<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Class Address
 *
 * @property int $id
 * @property int $usuario_id
 * @property string $address
 * @property string $city
 * @property string $province
 * @property string $postal_code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read Usuario $usuario
 *
 * @package App\Models
 */
class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'usuario_id',
        'address',
        'city',
        'province',
        'postal_code',
    ];

    /**
     * Get the user (usuario) that owns the address.
     *
     * @return BelongsTo<Usuario, Address>
     */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }
}
