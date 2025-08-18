<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $reviews = [
        ['rating' => 1, 'comment' => 'Terrible. Never again.'],
        ['rating' => 2, 'comment' => 'Not great.'],
        ['rating' => 3, 'comment' => 'Okay.'],
        ['rating' => 4, 'comment' => 'Pretty good.'],
        ['rating' => 5, 'comment' => 'Amazing!'],
    ];

    public function definition()
    {
        $review = Arr::random($this->reviews);

        return [
            'rating' => $review['rating'],
            'comment' => $review['comment'],
            'user_id' => User::inRandomOrder()->value('id'),
            'product_id' => Product::inRandomOrder()->value('id'),
        ];
    }
}
