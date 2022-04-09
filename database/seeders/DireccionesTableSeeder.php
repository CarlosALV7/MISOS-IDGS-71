<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DireccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('direcciones')->insert([
            [
                'estado_id' => 15
                ,'municipio_id' => 707
                , 'usuario_id' => 1
                , 'localidad' => 'Santa María Atarasquillo'
                , 'calle' => 'Carretera, Del Depto del Distrito Federal km 7.5'
                , 'numero_interior' => null
                , 'numero_exterior' => 'SN'
                , 'codigo_postal' => '52044'
                , 'referencias' => 'A 300 mts de la gasolinera G500'
            ]
        ]);
    }
}
