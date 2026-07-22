<?php

namespace App\Services;

use App\Models\Review;
use App\Models\Product;
use App\Models\Usuario;

class ReviewService
{
    /**
     * Store a new review.
     *
     * @param array $data
     * @param Product $product
     * @param Usuario $user
     * @return Review
     */
    public function storeReview(array $data, Product $product, Usuario $user): Review
    {
        return Review::create([
            'usuario_id' => $user->id,
            'product_id' => $product->id,
            'rating' => $data['rating'],
            'comment' => $data['comment'],
        ]);
    }

    /**
     * Delete a review.
     *
     * @param Review $review
     * @return bool|null
     */
    public function deleteReview(Review $review)
    {
        return $review->delete();
    }
}
