<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyProfileSeeder extends Seeder
{
    public function run()
    {
        DB::table('company_profiles')->insert([
            'company' => 'TYRSA CONSORCIO, S.A. DE C.V.',
            'motto' => 'SOLUCIONES EN LOGISTICA INTERIOR',
            'street' => 'Cuernavaca',
            'outdoor' => 'S/N',
            'intdoor' => null,
            'suburb' => 'EjIdo el Quemado',
            'city' => 'Tultepec',
            'state' => 'Estado de México',
            'zip_code' => '54960',
            'rfc' => 'TCO990507S91',
            'telephone' => '552647203',
            'telephone2' => '5526473330',
            'email' => 'info@tyrsa.com.mx',
            'website' => 'http://www.tyrsa.com.mx',
            'logo' => null,
            'created_at' => '2022/06/01 00:00:01', 
            'updated_at' => '2022/06/01 00:00:01'
        ]);
    }
}
