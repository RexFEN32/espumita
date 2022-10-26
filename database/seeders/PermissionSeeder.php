<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permisssions = [
            'CATALOGOS',
            'PEDIDOS',
            'CONTABILIDAD',

            'VER ROLES',
            'CREAR ROLES',
            'EDITAR ROLES',
            'BORRAR ROLES',
            
            'VER USUARIOS',
            'CREAR USUARIOS',
            'EDITAR USUARIOS',
            'BORRAR USUARIOS',

            'VER EMPRESAS',
            'CREAR EMPRESAS',
            'EDITAR EMPRESAS',
            'BORRAR EMPRESAS',

            'VER CONFIGURACIONES',
            'CREAR CONFIGURACIONES',
            'EDITAR CONFIGURACIONES',
            'BORRAR CONFIGURACIONES',

            'VER MONEDAS',
            'CREAR MONEDAS',
            'EDITAR MONEDAS',
            'BORRAR MONEDAS',
            
            'VER CLIENTES',
            'CREAR CLIENTES',
            'EDITAR CLIENTES',
            'BORRAR CLIENTES',

            'VER CONTACTOS',
            'CREAR CONTACTOS',
            'EDITAR CONTACTOS',
            'BORRAR CONTACTOS',

            'VER UNIDADES',
            'CREAR UNIDADES',
            'EDITAR UNIDADES',
            'BORRAR UNIDADES',

            'VER FAMILIAS',
            'CREAR FAMILIAS',
            'EDITAR FAMILIAS',
            'BORRAR FAMILIAS',

            'VER AUTORIZACIONES',
            'CREAR AUTORIZACIONES',
            'EDITAR AUTORIZACIONES',
            'BORRAR AUTORIZACIONES',

            'VER VENDEDORES',
            'CREAR VENDEDORES',
            'EDITAR VENDEDORES',
            'BORRAR VENDEDORES',

            'VER PEDIDOS',
            'CREAR PEDIDOS',
            'EDITAR PEDIDOS',
            'BORRAR PEDIDOS',

            'VER PARTIDAS',
            'CREAR PARTIDAS',
            'EDITAR PARTIDAS',
            'BORRAR PARTIDAS',

            'VER CUENTAS X COBRAR',
            'CREAR CUENTAS X COBRAR',
            'EDITAR CUENTAS X COBRAR',
            'BORRAR CUENTAS X COBRAR',

            'VER APLICACIONES DE PAGO',
            'CREAR APLICACIONES DE PAGO',
            'EDITAR APLICACIONES DE PAGO',
            'BORRAR APLICACIONES DE PAGO',
        ];
        foreach($permisssions as $permisssion){
            Permission::create(['name'=>$permisssion]);
        }
    }
}
