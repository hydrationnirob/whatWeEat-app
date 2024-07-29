<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('brands')->insert([
            'name' => 'PepsiCo',
            'description' => 'Apple Inc. is an American multinational technology company that specializes in consumer electronics, computer software, and online services.',
            
        ]);
         
        DB::table('brands')->insert([
            'name' => 'Coca-Cola',
            'description' => 'Samsung Electronics Co., Ltd. is a South Korean multinational electronics company headquartered in the Yeongtong District of Suwon.',
            
        ]);

        DB::table('brands')->insert([
            'name' => 'Nestle',
            'description' => 'Nestlé S.A. is a Swiss multinational food and drink processing conglomerate corporation headquartered in Vevey, Vaud, Switzerland.',
            
        ]);

        DB::table('brands')->insert([
            'name' => 'Unilever',
            'description' => 'Unilever is a British-Dutch multinational consumer goods company, headquartered in London, England.',
            
        ]);

        DB::table('brands')->insert([
            'name' => 'Procter & Gamble',
            'description' => 'Procter & Gamble is an American multinational consumer goods corporation headquartered in Cincinnati, Ohio.',
            
        ]);

        DB::table('brands')->insert([
            'name' => 'Pfizer',
            'description' => 'Pfizer Inc. is an American multinational pharmaceutical corporation.',
            
        ]);
        
    }
}