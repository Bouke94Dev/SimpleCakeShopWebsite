<?php

namespace App\Dto;

class ReviewDTO
{
    public function __construct(public int $product_id, public int $rating, public ?string $comment = null
    ) {}
}
