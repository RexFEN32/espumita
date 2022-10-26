<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Super Usuario',
            'email' => 'root@tyrsawes.site',
            'email_verified_at' => '2022/06/01',
            'password' => '$2y$10$arcj2ZcemHQQInZVq5ZAvOlFrsqkaUryfASuEyVr2mi8E.3mdZGry',
            'created_at' => '2022/06/01 00:00:01',
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('users')->insert([
            'name' => 'Administrador del Sistema',
            'email' => 'admin@tyrsawes.site',
            'email_verified_at' => '2022/06/01',
            'password' => '$2y$10$arcj2ZcemHQQInZVq5ZAvOlFrsqkaUryfASuEyVr2mi8E.3mdZGry',
            'created_at' => '2022/06/01 00:00:01',
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('users')->insert([
            'name' => 'Usuario del Sistema',
            'email' => 'user@tyrsawes.site',
            'email_verified_at' => '2022/06/01',
            'password' => '$2y$10$arcj2ZcemHQQInZVq5ZAvOlFrsqkaUryfASuEyVr2mi8E.3mdZGry',
            'created_at' => '2022/06/01 00:00:01',
            'updated_at' => '2022/06/01 00:00:01'
        ]);
    }
}
