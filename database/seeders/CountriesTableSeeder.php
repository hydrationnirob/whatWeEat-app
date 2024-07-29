<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('countries')->insert([
            'name' => 'United States',
            'code' => 'US',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('countries')->insert([
            'name' => 'United Kingdom',
            'code' => 'UK',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('countries')->insert([
            'name' => 'Canada',
            'code' => 'CA',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('countries')->insert([
            'name' => 'Australia',
            'code' => 'AU',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('countries')->insert([
            'name' => 'New Zealand',
            'code' => 'NZ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
