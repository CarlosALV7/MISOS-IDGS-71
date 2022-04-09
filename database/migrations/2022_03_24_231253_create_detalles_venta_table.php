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
        Schema::create('detalles_venta', function (Blueprint $table) {
            $table->mediumIncrements('id')->comment('ID');
            $table->unsignedMediumInteger('producto_id')->comment('ID producto');
            $table->decimal('costo_unitario', 10,2)->comment('Costo unitario del producto');
            $table->decimal('precio_unitario', 10,2)->comment('Precio unitario del producto');
            $table->decimal('cantidad', 10,2)->comment('Cantidad del producto');
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
        Schema::dropIfExists('detalles_venta');
    }
};
