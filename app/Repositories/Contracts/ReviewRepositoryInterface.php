<?php

namespace App\Repositories\Contracts;

use App\Dto\ReviewDTO;
use App\Models\Review;
use Illuminate\Support\Collection;

interface ReviewRepositoryInterface
{
    public function createReview(ReviewDTO $reviewDto): Review;

    public function getReviewsForProduct(int $productId): Collection;
}
