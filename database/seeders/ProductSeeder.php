<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Laptop', 'price' => 999],
            ['name' => 'Smartphone', 'price' => 699],
            ['name' => 'Tablet', 'price' => 499],
            ['name' => 'Headphones', 'price' => 149],
            ['name' => 'Keyboard', 'price' => 79],
            ['name' => 'Mouse', 'price' => 49],
            ['name' => 'Monitor', 'price' => 349],
            ['name' => 'Webcam', 'price' => 89],
            ['name' => 'USB Drive', 'price' => 19],
            ['name' => 'External SSD', 'price' => 129],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
