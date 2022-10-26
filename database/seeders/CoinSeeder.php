<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoinSeeder extends Seeder
{
    public function run()
    {
        DB::table('coins')->insert([
            'coin' => 'PESO MEXICANO', 
            'symbol' => '$', 
            'code' => 'MXN',
            'exchange_rate' => '1.00', 
            'date_application' => '2022/06/01',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('coins')->insert([
            'coin' => 'DÓLAR ESTADOUNIDENSE', 
            'symbol' => '$', 
            'code' => 'USD',
            'exchange_rate' => '19.87', 
            'date_application' => '2022/06/01',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('coins')->insert([
            'coin' => 'EURO', 
            'symbol' => '€', 
            'code' => 'EUR',
            'exchange_rate' => '20.96', 
            'date_application' => '2022/06/01',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('coins')->insert([
            'coin' => 'LIBRA ESTERLINA', 
            'symbol' => '£', 
            'code' => 'GBP',
            'exchange_rate' => '24.59', 
            'date_application' => '2022/06/01',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
    }
}
