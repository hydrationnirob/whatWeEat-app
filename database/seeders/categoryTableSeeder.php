<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('categorys')->insert([
             'name' => 'Halal',
             'Description' => 'Halal food is food permitted under Islamic dietary guidelines.',
             'icon_url' => 'https://cdn.pixabay.com/photo/2016/01/05/13/58/apple-1122537_960_720.jpg',
             'created_at' => now(),
             'updated_at' => now(),
         ]);

            DB::table('categorys')->insert([
                'name' => 'Ban',
                'Description' => 'Veganism is the practice of abstaining from the use of animal products, particularly in diet, and an associated philosophy that rejects the commodity status of animals.',
                'icon_url' => 'https://cdn.pixabay.com/photo/2016/01/05/13/58/apple-1122537_960_720.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('categorys')->insert([
                'name' => 'Alcahol',
                'Description' => 'Vegetarianism is the practice of abstaining from the consumption of meat (red meat, poultry, seafood, and the flesh of any other animal), and may also include abstention from by-products of animal slaughter.',
                'icon_url' => 'https://cdn.pixabay.com/photo/2016/01/05/13/58/apple-1122537_960_720.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('categorys')->insert([
                'name' => 'Pig Meat',
                'Description' => 'Vegetarianism is the practice of abstaining from the consumption of meat (red meat, poultry, seafood, and the flesh of any other animal), and may also include abstention from by-products of animal slaughter.',
                'icon_url' => 'https://cdn.pixabay.com/photo/2016/01/05/13/58/apple-1122537_960_720.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);


    }
}
