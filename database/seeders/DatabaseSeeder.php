<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RolesPermisosTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EstadosTableSeeder::class);
        $this->call(MunicipiosTableSeeder::class);
        $this->call(DireccionesTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);
        $this->call(ProductosTableSeeder::class);
        $this->call(CitasTableSeeder::class);
        $this->call(VentasTableSeeder::class);
        $this->call(Detalles_ventaTableSeeder::class);
    }
}
