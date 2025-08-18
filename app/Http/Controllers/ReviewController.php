<?php

namespace App\Http\Controllers;

use App\Dto\ReviewDTO;
use App\Http\Requests\ReviewRequest;
use App\Models\Product;
use App\Repositories\ReviewRepository;

class ReviewController extends Controller
{
    public function __construct(
        protected ReviewRepository $reviews
    ) {}

    public function index(Product $products)
    {
        return $products->reviews()
            ->with('user')
            ->latest()
            ->get();
    }

    public function store(ReviewRequest $reviewRequest)
    {
        $validated = $reviewRequest->validated();

        $reviewDto = new ReviewDTO(...$validated);
        $review = $this->reviews->createReview($reviewDto);

        return $review->load('user');
    }
}
