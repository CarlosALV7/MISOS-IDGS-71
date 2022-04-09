<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            ['categoria' => 'RAM', 'estatus' => 'activa']
            , ['categoria' => 'ROM', 'estatus' => 'activa']
            , ['categoria' => 'Tarjeta de video', 'estatus' => 'activa']
            , ['categoria' => 'Procesadores', 'estatus' => 'activa']
        ]);
    }
}
