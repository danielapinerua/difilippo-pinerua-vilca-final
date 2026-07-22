<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Product;
use App\Models\Review;
use App\Services\ReviewService;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    protected ReviewService $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    /**
     * Store a newly created review in storage.
     */
    public function store(ReviewRequest $request, Product $product)
    {
        $this->reviewService->storeReview($request->validated(), $product, Auth::user());

        return back()->with('success', 'Tu reseña ha sido guardada exitosamente.');
    }

    /**
     * Remove the specified review from storage.
     */
    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);

        $this->reviewService->deleteReview($review);

        return back()->with('success', 'La reseña ha sido eliminada.');
    }
}
