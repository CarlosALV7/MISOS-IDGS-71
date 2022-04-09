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
        Schema::create('citas', function (Blueprint $table) {
            $table->mediumIncrements('id')->comment('ID');
            $table->unsignedBigInteger('usuario_id')->nullable()->comment('ID usuario');
            $table->string('fecha', 20)->nullable()->comment('Fecha de la cita');
            $table->string('descripcion', 500)->nullable()->comment('Razón de la cita');
            $table->enum('estatus', ['asistio','no asistio'])->comment('Asistencia del cliente');
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
        Schema::dropIfExists('citas');
    }
};
