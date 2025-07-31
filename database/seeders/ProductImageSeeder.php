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
            'cake_one.jpg',
            'cake_two.jpg',
            'cake_three.jpg',
            'cake_four.jpg',
            'cake_five.jpg',
            'cake_six.jpg',
            'cake_seven.jpg',
        ];

        foreach ($images as $image) {
            ProductImage::create([
                'image' => $image,
            ]);
        }
    }
}
