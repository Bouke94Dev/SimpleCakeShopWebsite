<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            'images/cake_one.jpg',
            'images/cake_two.jpg',
            'images/cake_three.jpg',
            'images/cake_four.jpg',
            'images/cake_five.jpg',
            'images/cake_six.jpg',
            'images/cake_seven.jpg',
        ];

        foreach ($images as $image) {
            ProductImage::create([
                'image' => $image,
            ]);
        }
    }
}
