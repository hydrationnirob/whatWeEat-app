<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table ('requests')->insert([
            'user_id' => 1,
            'name' => 'Chocolate',
            'bar_code' => '123456789',
            'description' => 'A delicious chocolate cake',
            'created_at' => '2024-08-01 09:02:33',
            'updated_at' => '2024-08-01 09:02:33',
        ]);
        DB::table ('requests')->insert([
            'user_id' => 1,
            'name' => 'Coca-Cola',
            'bar_code' => '987654321',
            'description' => 'A refreshing Coca-Cola',
            'created_at' => '2024-08-01 09:02:33',
            'updated_at' => '2024-08-01 09:02:33',
        ]);
        DB::table ('requests')->insert([
            'user_id' => 1,
            'name' => 'Bambay Chips',
            'bar_code' => '123456789',
            'description' => 'A delicious chocolate cake',
            'created_at' => '2024-08-01 09:02:33',
            'updated_at' => '2024-08-01 09:02:33',
        ]);
    }
}
