<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*        DB::table('users')->insert([
            [
                 'name' => 'Josué'
                , 'primer_apellido' => 'Pacheco'
                , 'segundo_apellido' => 'Chávez'
                , 'fecha_nacimiento' => '2000-12-07'
                , 'sexo' => 'masculino'
                , 'email' => 'josuecheco02@gmail.com'
                , 'rol' => 'Administrador'
                , 'password' => bcrypt('12345678')
                , 'dias_visita' => null
                , 'estatus' => 'activo'
                , 'created_at' => '2022-02-26 09:29:00'
                , 'updated_at' => '2022-02-26 09:29:00'
            ]
        ]);
        */

        User::create([
                 'name' => 'Josué'
                , 'primer_apellido' => 'Pacheco'
                , 'segundo_apellido' => 'Chávez'
                , 'fecha_nacimiento' => '2000-12-07'
                , 'sexo' => 'masculino'
                , 'email' => 'josuecheco02@gmail.com'
                , 'rol' => 'Administrador'
                , 'password' => bcrypt('12345678')
                , 'dias_visita' => null
                , 'estatus' => 'activo'
                , 'created_at' => '2022-02-26 09:29:00'
                , 'updated_at' => '2022-02-26 09:29:00'
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Carlos'
           , 'primer_apellido' => 'Requena'
           , 'segundo_apellido' => 'Alvarez'
           , 'fecha_nacimiento' => '2002-02-27'
           , 'sexo' => 'masculino'
           , 'email' => 'carlos.alv@gmail.com'
           , 'rol' => 'Cliente'
           , 'password' => bcrypt('12345678')
           , 'dias_visita' => null
           , 'estatus' => 'activo'
           , 'created_at' => '2022-02-26 09:29:00'
           , 'updated_at' => '2022-02-26 09:29:00'
   ])->assignRole('Cliente');
    }
}
