<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorizationSeeder extends Seeder
{
    public function run()
    {
        DB::table('authorizations')->insert([
            'job' => 'CAPTURADO',
            'clearance_level' => '100000',
            'key_code' => '$2y$10$arcj2ZcemHQQInZVq5ZAvOlFrsqkaUryfASuEyVr2mi8E.3mdZGry',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('authorizations')->insert([
            'job' => 'Gerente de Ventas',
            'clearance_level' => '100000',
            'key_code' => '$2y$10$arcj2ZcemHQQInZVq5ZAvOlFrsqkaUryfASuEyVr2mi8E.3mdZGry',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('authorizations')->insert([
            'job' => 'Administración',
            'clearance_level' => '500000',
            'key_code' => '$2y$10$arcj2ZcemHQQInZVq5ZAvOlFrsqkaUryfASuEyVr2mi8E.3mdZGry',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('authorizations')->insert([
            'job' => 'Director de Ventas',
            'clearance_level' => '100000',
            'key_code' => '$2y$10$arcj2ZcemHQQInZVq5ZAvOlFrsqkaUryfASuEyVr2mi8E.3mdZGry',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('authorizations')->insert([
            'job' => 'Director de Operaciones',
            'clearance_level' => '500000',
            'key_code' => '$2y$10$arcj2ZcemHQQInZVq5ZAvOlFrsqkaUryfASuEyVr2mi8E.3mdZGry',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('authorizations')->insert([
            'job' => 'Director General',
            'clearance_level' => '1000000',
            'key_code' => '$2y$10$arcj2ZcemHQQInZVq5ZAvOlFrsqkaUryfASuEyVr2mi8E.3mdZGry',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
    }
}
