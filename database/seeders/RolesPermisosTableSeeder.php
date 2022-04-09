<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $rol_administrador = Role::create(['name' => 'Administrador']);
    $rol_cliente = Role::create(['name' => 'Cliente']);

    $permission = Permission::create(['name' => 'productos.index']);
    $rol_administrador->givePermissionTo($permission);
    $rol_cliente->givePermissionTo($permission);

    
    $permission = Permission::create(['name' => 'productos.show']);
    $rol_administrador->givePermissionTo($permission);
    $rol_cliente->givePermissionTo($permission);

    $permission = Permission::create(['name' => 'productos.create']);
    $rol_administrador->givePermissionTo($permission);

    $permission = Permission::create(['name' => 'productos.store']);
    $rol_administrador->givePermissionTo($permission);

    $permission = Permission::create(['name' => 'productos.update']);
    $rol_administrador->givePermissionTo($permission);

    $permission = Permission::create(['name' => 'productos.destroy']);
    $rol_administrador->givePermissionTo($permission);


    //categorias
    $permission = Permission::create(['name' => 'categorias.index']);
    $rol_administrador->givePermissionTo($permission);
    $rol_cliente->givePermissionTo($permission);

    $permission = Permission::create(['name' => 'categorias.show']);
    $rol_administrador->givePermissionTo($permission);
    $rol_cliente->givePermissionTo($permission);

    $permission = Permission::create(['name' => 'categorias.create']);
    $rol_administrador->givePermissionTo($permission);

    $permission = Permission::create(['name' => 'categorias.store']);
    $rol_administrador->givePermissionTo($permission);

    $permission = Permission::create(['name' => 'categorias.update']);
    $rol_administrador->givePermissionTo($permission);

    $permission = Permission::create(['name' => 'categorias.destroy']);
    $rol_administrador->givePermissionTo($permission);


    //detalles venta
    $permission = Permission::create(['name' => 'detalles_venta.index']);
    $rol_administrador->givePermissionTo($permission);
    $rol_cliente->givePermissionTo($permission);

    $permission = Permission::create(['name' => 'detalles_venta.show']);
    $rol_administrador->givePermissionTo($permission);
    $rol_cliente->givePermissionTo($permission);

    $permission = Permission::create(['name' => 'detalles_venta.create']);
    $rol_administrador->givePermissionTo($permission);

    $permission = Permission::create(['name' => 'detalles_venta.store']);
    $rol_administrador->givePermissionTo($permission);

    $permission = Permission::create(['name' => 'detalles_venta.update']);
    $rol_administrador->givePermissionTo($permission);

    $permission = Permission::create(['name' => 'detalles_venta.destroy']);
    $rol_administrador->givePermissionTo($permission);

    //ventas

    $permission = Permission::create(['name' => 'ventas.index']);
    $rol_administrador->givePermissionTo($permission);
    $rol_cliente->givePermissionTo($permission);

    $permission = Permission::create(['name' => 'ventas.show']);
    $rol_administrador->givePermissionTo($permission);
    $rol_cliente->givePermissionTo($permission);

    $permission = Permission::create(['name' => 'ventas.create']);
    $rol_administrador->givePermissionTo($permission);

    $permission = Permission::create(['name' => 'ventas.store']);
    $rol_administrador->givePermissionTo($permission);

    $permission = Permission::create(['name' => 'ventas.update']);
    $rol_administrador->givePermissionTo($permission);

    $permission = Permission::create(['name' => 'ventas.destroy']);
    $rol_administrador->givePermissionTo($permission);
    }
}
