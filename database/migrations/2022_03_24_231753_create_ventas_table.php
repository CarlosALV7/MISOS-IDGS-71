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
        Schema::create('ventas', function (Blueprint $table) {
            $table->mediumIncrements('id')->comment('ID');
            $table->unsignedMediumInteger('producto_id')->comment('ID producto');
            $table->unsignedBigInteger('usuario_id')->comment('ID usuario');
            $table->string('fecha')->nullable()->comment('Fecha y hora de la venta');
            $table->decimal('total', 10,2)->comment('Total a pagar');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('producto_id')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
};
