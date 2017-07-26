<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('tipo_solicitante');
            $table->string('no_identificacion');
            $table->string('direccion_correspondencia','255');
            $table->string('calidad_solicitante','255');
            $table->unsignedInteger('ciudad_id');
            $table->string('telefono','20');
            $table->string('correo','100');
            $table->string('nombre_predio','255')->nullable();
            $table->string('ubicacion','255');
            $table->double('x_cod');
            $table->double('y_cod');
            $table->unsignedInteger('ciudad_predio');
            $table->string('direccion_predio','255');
            $table->string('barrio_predio','255');
            $table->string('vereda_predio','255')->nullable();
            $table->string('corregimiento_predio','255')->nullable();
            $table->unsignedInteger('user_id');

            $table->foreign('ciudad_predio')->references('id')->on('ciudad');
            $table->foreign('ciudad_id')->references('id')->on('ciudad');
            $table->foreign('user_id')->references('id')->on('users');

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
        //
        Schema::dropIfExists('solicitudes');
    }
}
