<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('ingredients')->insert([
             'name' => 'Flour',
             'quantity' => '2 cups',
             'product_id' => 1,
            
         ]);

            DB::table('ingredients')->insert([
                'name' => 'Sugar',
                'quantity' => '1 cup',
                'product_id' => 1,
                
            ]);

            DB::table('ingredients')->insert([
                'name' => 'Eggs',
                'quantity' => '2',
                'product_id' => 1,
                
            ]);

            DB::table('ingredients')->insert([
                'name' => 'Butter',
                'quantity' => '1 stick',
                'product_id' => 1,
                
            ]);

            DB::table('ingredients')->insert([
                'name' => 'Baking Powder',
                'quantity' => '1 tsp',
                'product_id' => 1,
                
            ]);

            DB::table('ingredients')->insert([
                'name' => 'Salt',
                'quantity' => '1/2 tsp',
                'product_id' => 1,
                
            ]);

            DB::table('ingredients')->insert([
                'name' => 'Milk',
                'quantity' => '1 cup',
                'product_id' => 1,
                
            ]);
    }
}
