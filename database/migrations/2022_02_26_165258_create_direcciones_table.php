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
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->unsignedSmallInteger('estado_id')->comment('ID estado');
            $table->unsignedMediumInteger('municipio_id')->comment('ID municipio');
            $table->unsignedBigInteger('usuario_id')->comment('ID usuario');
            $table->string('localidad', 100)->comment('Localidad');
            $table->string('calle', 100)->comment('Calle');
            $table->string('numero_interior', 15)->nullable()->comment('Número interior');
            $table->string('numero_exterior', 15)->comment('Número exterior');
            $table->string('codigo_postal', 15)->comment('Código postal');
            $table->string('referencias', 100)->comment('Referencias');
            // llaves foráneas
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->foreign('municipio_id')->references('id')->on('municipios');
            $table->foreign('usuario_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
};
