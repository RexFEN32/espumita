<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            'minimum_salary_zlfn' => '260.34',
            'minimum_salary' => '172.87',
            'uma' => '96.22',
            'iva' => '16',
            'year_application' => '2022',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
    }
}
