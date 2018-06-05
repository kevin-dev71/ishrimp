<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Planificaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planificaciones', function (Blueprint $table) {
            $table->unsignedInteger('finca_id');
            $table->foreign('finca_id')->references('id')->on('fincas');
            $table->unsignedInteger('ciclos_id');
            $table->foreign('ciclos_id')->references('id')->on('ciclos');
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
        Schema::dropIfExists('planificaciones');
    }
}
