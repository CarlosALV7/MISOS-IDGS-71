<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('citas')->insert([

         ['usuario_id' => 1, 'estatus' => 'asistio'],
         ['usuario_id' => 1, 'estatus' => 'asistio']

        ]);
    }
}
