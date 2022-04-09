<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'categoria_id' => 1
            , 'producto' => 'RAM'
            , 'costo_unitario' => 400
            , 'precio_unitario' => 450
            , 'existencias' => 100
            , 'descripcion' => 'RAM 4GB ddr3'
            , 'estatus' => 'activo'
        ]);
    }
}
