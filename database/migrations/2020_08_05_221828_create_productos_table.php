<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre_producto');
            $table->string('Informacion');
            $table->integer('Precio');
            $table->integer('Visitas')->default(0);

            $table->integer('tipo_id')->unsigned()->nullable();
            $table->foreign('tipo_id')->references('id')
                ->on('tipo_productos')->onDelete('cascade');

            $table->integer('imagen_id')->unsigned()->nullable();
            $table->foreign('imagen_id')->references('id')
                ->on('imagen_productos')->onDelete('cascade');
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
        Schema::dropIfExists('productos');
    }
}
