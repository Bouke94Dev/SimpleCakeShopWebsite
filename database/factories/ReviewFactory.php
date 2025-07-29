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
        ['rating' => 1, 'description' => 'Terrible. Never again.'],
        ['rating' => 2, 'description' => 'Not great.'],
        ['rating' => 3, 'description' => 'Okay.'],
        ['rating' => 4, 'description' => 'Pretty good.'],
        ['rating' => 5, 'description' => 'Amazing!'],
    ];

    public function definition()
    {
        $review = Arr::random($this->reviews);

        return [
            'rating' => $review['rating'],
            'description' => $review['description'],
            'user_id' => User::inRandomOrder()->value('id'),
            'product_id' => Product::inRandomOrder()->value('id'),
        ];
    }
}
