<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NutritionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nutrition')->insert([
            'product_id' => 1,
            'calories' => '200',
            'fat' => '10',
            'protein' => '5',
            'carbohydrates' => '25',
        ]);

        DB::table('nutrition')->insert([
            'product_id' => 2,
            'calories' => '150',
            'fat' => '5',
            'protein' => '3',
            'carbohydrates' => '20',
        ]);

        DB::table('nutrition')->insert([
            'product_id' => 3,
            'calories' => '250',
            'fat' => '15',
            'protein' => '10',
            'carbohydrates' => '30',
        ]);

        DB::table('nutrition')->insert([
            'product_id' => 4,
            'calories' => '300',
            'fat' => '20',
            'protein' => '15',
            'carbohydrates' => '35',
        ]);

        DB::table('nutrition')->insert([
            'product_id' => 5,
            'calories' => '350',
            'fat' => '25',
            'protein' => '20',
            'carbohydrates' => '40',
        ]);


    }
}
