<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre_sucursal')->unique();
            $table->string('Direccion')->unique();
            $table->integer('Telefono');
            $table->string('Horario_atencion');

            $table->integer('imagen_id')->unsigned()->nullable();
            $table->foreign('imagen_id')->references('id')
                ->on('imagen_sucursals')->onDelete('cascade');

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
        Schema::dropIfExists('sucursales');
    }
}
