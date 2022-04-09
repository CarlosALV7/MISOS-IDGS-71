<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30)->comment('Nombre');
            $table->string('primer_apellido', 30)->comment('Primer apellido');
            $table->string('segundo_apellido', 30)->comment('Segundo apellido');
            $table->string('fecha_nacimiento', 30)->comment('Fecha de nacimiento');
            $table->enum('sexo', ['femenino', 'masculino', 'prefiero no decirlo'])->comment('Sexo');
            $table->string('email',50)->unique()->comment('Correo electrónico del usuario');
            $table->enum('rol', ['Administrador', 'Cliente', 'Proveedor'])->comment('Perfil');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',100);
            $table->rememberToken();
            $table->set('dias_visita', ['lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado', 'domingo'])->nullable()->comment('Días de visita');
            $table->enum('estatus', ['activo', 'inactivo'])->comment('Estatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
