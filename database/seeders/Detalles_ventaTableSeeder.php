<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Detalles_ventaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detalles_venta')->insert([

           [ 
             'producto_id' => 1
             ,'costo_unitario' => 400
             , 'precio_unitario' => 450
             , 'cantidad' => 2
           ],
           [ 
            'producto_id' => 1
            ,'costo_unitario' => 400
            , 'precio_unitario' => 450
            , 'cantidad' => 1
          ]

        ]);
    }
}
