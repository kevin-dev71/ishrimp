<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiclosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('finca_id');
            $table->foreign('finca_id')->references('id')->on('fincas');
            $table->string('ano');
            $table->string('ciclo');
            $table->date('fecha_inicial');
            $table->date('fecha_final');
            $table->softDeletes();
        });
        Schema::create('ciclos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('planificacion_id');
            $table->foreign('planificacion_id')->references('id')->on('planificaciones');
            $table->unsignedInteger('piscina_id');
            $table->foreign('piscina_id')->references('id')->on('piscinas');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->string('precio_larva');
            $table->string('densidad');
            $table->boolean('activo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciclos');
        Schema::dropIfExists('planificaciones');
    }
}
