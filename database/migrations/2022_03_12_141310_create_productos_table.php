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
        Schema::create('productos', function (Blueprint $table) {
            $table->mediumIncrements('id')->comment('ID');
            $table->unsignedSmallInteger('categoria_id')->comment('ID de categoría');
            $table->string('producto', 100)->comment('Nombre del producto');
            $table->decimal('costo_unitario', 10, 2)->comment('Costo unitario del producto');
            $table->decimal('precio_unitario', 10, 2)->comment('Precio unitario del producto');
            $table->decimal('existencias', 10, 2)->comment('Existencias del producto');
            $table->tinyText('descripcion')->comment('Descripción del producto');
            $table->enum('estatus', ['activo', 'inactivo'])->comment('Estatus del producto');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
