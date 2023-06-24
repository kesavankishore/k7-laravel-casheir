<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Basic', 
                'slug' => 'basic-plan', 
                'stripe_plan' => 'price_1NMOuJLktsuhqqfYPcOMoKuf', 
                'price' => 1500, 
                'description' => 'basic Plan'
            ],
            [
                'name' => 'Premium', 
                'slug' => 'premium-plan', 
                'stripe_plan' => 'price_1NMOt4LktsuhqqfYMLKvMGxT', 
                'price' => 2500, 
                'description' => 'Premium Plan'
            ],
            [
                'name' => 'Super Premium', 
                'slug' => 'super-premium-plan', 
                'stripe_plan' => 'price_1NMPtzLktsuhqqfYRvbxgcYH', 
                'price' => 3000, 
                'description' => 'Super Premium Plan'
            ]
        ];
   
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
