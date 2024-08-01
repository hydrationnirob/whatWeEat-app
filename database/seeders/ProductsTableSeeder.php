<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Chocolate',
            'slug' => 'pure chocolate cake 500g', 
            'display_name' => 'Chocolate Cake',
            'unit_size' => '500',
            'unit_type' => 'g',
            'Product_Category' => 'Cake',
             'Product_Sub_Category' => 'Chocolate',
            'bar_code' => '123456789',
            'description' => 'A delicious chocolate cake',
            'Category_id' => 1,
            'price' => '20.00',
            'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_Y3KKhol3mMO6Nx99gUO-Jm7x9Ha1tQ5Eww&s',
            'ingredients' => 'Flour, Sugar, Eggs, Butter, Baking Powder, Salt, Milk',
            'brand_id' => 1,
            'country_id' => 2,
        ]);

        DB::table('products')->insert([
            'name' => 'Coca-Cola',
            'slug' => 'coca-cola 320ml',
            'display_name' => 'Coca-Cola',
            'unit_size' => '320',
            'unit_type' => 'ml',
            'Product_Category' => 'Beverage',
            'Product_Sub_Category' => 'Coca-Cola',
            'bar_code' => '987654321',
            'description' => 'A refreshing Coca-Cola',
            'Category_id' => 4,
            'price' => '22.00',
            'image_url' => 'https://chaldn.com/_mpimage/coca-cola-can-imported-320-ml?src=https%3A%2F%2Feggyolk.chaldal.com%2Fapi%2FPicture%2FRaw%3FpictureId%3D127011&q=best&v=1',
            'ingredients' => 'Carbonated Water, Sugar, Caramel Color, Phosphoric Acid, Natural Flavors, Caffeine',
            'brand_id' => 2,
            'country_id' => 1,

        ]);

        DB::table('products')->insert([
            'name' => 'Bambay Chips',
            'slug' => 'bambay chips 200g',
            'display_name' => 'Bambay Chips',
            'unit_size' => '200',
            'unit_type' => 'g',
            'Product_Category' => 'Snacks',
            'Product_Sub_Category' => 'Chips',
            'bar_code' => '654654654',
            'description' => 'A delicious Bambay Chips',
            'Category_id' => 1,
            'price' => '54.00',
            'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmCHJywr0gdW3xWSaEWBlxaWrujjdLnK1_Gw&s',
            'ingredients' => 'Potatoes, Vegetable Oil, Salt',
            'brand_id' => 2,
            'country_id' => 1,

        ]);

        DB::table('products')->insert([
            'name' => 'pepsi',
            'slug' => 'pepsi 250ml',
            'display_name' => 'pepsi',
            'unit_size' => '250',
            'unit_type' => 'ml',
            'Product_Category' => 'Beverage',
            'Product_Sub_Category' => 'pepsi',
            'bar_code' => '456456456',
            'description' => 'A refreshing pepsi',
            'Category_id' => 1,
            'price' => '20.00',
            'image_url' => 'https://images.othoba.com/images/thumbs/0599749_pepsi-can-250ml.jpeg',
            'ingredients' => 'Carbonated Water, Sugar, Caramel Color, Phosphoric Acid, Natural Flavors, Caffeine',
            'brand_id' => 1,
            'country_id' => 1,
            
        ]);

        DB::table('products')->insert([
            'name' => 'Lays',
            'slug' => 'lays 200g',
            'display_name' => 'Lays',
            'unit_size' => '200',   
            'unit_type' => 'g',
            'Product_Category' => 'Snacks',
            'Product_Sub_Category' => 'Chips',
            'bar_code' => '789789789',
            'description' => 'A delicious Lays',
            'Category_id' => 4,
            'price' => '50.00',
            'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT08D-CG-rLsG9hCIhR2SfFGPEPnPANdxryyA&s',
            'ingredients' => 'Potatoes, Vegetable Oil, Salt',
            'brand_id' => 1,
            'country_id' =>2,

        ]);

        DB::table('products')->insert([
            'name' => 'Sprite',
            'slug' => 'sprite 250ml',
            'display_name' => 'Sprite',
            'unit_size' => '250',
            'unit_type' => 'ml',
            'Product_Category' => 'Beverage',
            'Product_Sub_Category' => 'Sprite',
            'bar_code' => '321321321',
            'description' => 'A refreshing Sprite',
            'Category_id' => 3,
            'price' => '42.00',
            'image_url' => 'https://nagadhat.com.bd/storage/media/products/images/1660719652_(Sprite)Sprite%20Can%20250-ml.jpg',
            'ingredients' => 'Carbonated Water, Sugar, Caramel Color, Phosphoric Acid, Natural Flavors, Caffeine',
            'brand_id' => 1,
            'country_id' => 2,

        ]);

        DB::table('products')->insert([
            'name' => 'Pringles',
            'slug' => 'pringles 134g',
            'display_name' => 'Pringles',
            'unit_size' => '134',
            'unit_type' => 'g',
            'Product_Category' => 'Snacks',
            'Product_Sub_Category' => 'Chips',  
            'bar_code' => '987987987',
            'description' => 'A delicious Pringles',
            'Category_id' =>1,
            'price' => '105.00',
            'image_url' => 'https://chaldn.com/_mpimage/pringles-original-potato-chips-134-gm?src=https%3A%2F%2Feggyolk.chaldal.com%2Fapi%2FPicture%2FRaw%3FpictureId%3D154936&q=best&v=1&m=400',
            'ingredients' => 'Potatoes, Vegetable Oil, Salt',
            'brand_id' => 2,
            'country_id' => 1,
        ]);

    }
}
