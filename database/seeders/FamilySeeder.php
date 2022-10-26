<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamilySeeder extends Seeder
{
    public function run()
    {
        DB::table('families')->insert([
            'family' => 'Sistema de Almacemiento (Racks)',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('families')->insert([
            'family' => 'Manejo de Materiales (Conveyors)',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('families')->insert([
            'family' => 'Equipo Auxiliar para Almacen',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('families')->insert([
            'family' => 'Automatización (Pick to Ligth/WMS)',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('families')->insert([
            'family' => 'Selectivo',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('families')->insert([
            'family' => 'Doble Profundidad',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('families')->insert([
            'family' => 'Mini Rack',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('families')->insert([
            'family' => 'Pasarela',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('families')->insert([
            'family' => 'Drive In/Thru',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('families')->insert([
            'family' => 'Carton Flow',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('families')->insert([
            'family' => 'Push Back',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('families')->insert([
            'family' => 'Dinámico',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('families')->insert([
            'family' => 'Entrepiso',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('families')->insert([
            'family' => 'Estanteria',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
        DB::table('families')->insert([
            'family' => 'Cantiliever',
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
    }
}
