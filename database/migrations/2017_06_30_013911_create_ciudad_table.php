<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiudadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ciudad', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('codigo_ciudad');
            $table->string('nombre_ciudad');
            $table->decimal('latitud_ciudad');
            $table->decimal('longitud_ciudad');
            $table->integer('codigo_departamento');
            $table->string('nombre_departamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ciudad', function (Blueprint $table) {
            //
        });
    }
}
