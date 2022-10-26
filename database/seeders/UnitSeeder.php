<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    public function run()
    {
        DB::table('units')->insert([
            'unit' => 'Pieza',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('units')->insert([
            'unit' => 'Metro',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('units')->insert([
            'unit' => 'Pulgada',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('units')->insert([
            'unit' => 'Kilogramo',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
    }
}
