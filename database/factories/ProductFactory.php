<?php

namespace Database\Factories;

use App\Models\ProductType;
use Illuminate\Support\Arr;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $cakePhrases = [
            'Topped with fresh ingredients and whipped cream.',
            'A moist cake sponge with a buttercream filling.',
            'Classic red velvet with a smooth cream cheese frosting.',
            'Perfect for birthdays, weddings, or any celebration.',
            'Drizzled with rich caramel and sprinkled with nuts.',
            'Our signature cake with a buttery biscuit base.',
        ];

        return [
            'name' => fake()->words(2, true).' cake',
            'description' => Arr::random($cakePhrases),
            'amount' => fake()->numberBetween(1, 100),
            'price' => fake()->randomFloat(2, 10, 50),
            'product_image_id' => ProductImage::inRandomOrder()->value('id'),
        ];
    }
}
