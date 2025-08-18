<?php

namespace App\Repositories;

use App\Dto\ReviewDTO;
use App\Models\Review;
use App\Repositories\Contracts\ReviewRepositoryInterface;
use App\Services\AuthService;
use Illuminate\Support\Collection;

class ReviewRepository implements ReviewRepositoryInterface
{
    public function __construct(private AuthService $authService) {}

    public function createReview(ReviewDTO $reviewDto): Review
    {
        return Review::create([
            'user_id' => $this->authService->getUserId(),
            'product_id' => $reviewDto->product_id,
            'rating' => $reviewDto->rating,
            'comment' => $reviewDto->comment ?? null,
        ]);
    }

    public function getReviewsForProduct(int $productId): Collection
    {
        return Review::with('user')
            ->where('product_id', $productId)
            ->latest()
            ->get();
    }
}
