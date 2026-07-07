<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class CategoryProduct
 *
 * @property int $id
 * @property int $product_id
 * @property int $category_id
 *
 * @property-read Product $product
 * @property-read Category $category
 *
 * @package App\Models
 */
class CategoryProduct extends Pivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the product that owns the pivot.
     *
     * @return BelongsTo<Product, CategoryProduct>
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the category that owns the pivot.
     *
     * @return BelongsTo<Category, CategoryProduct>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
