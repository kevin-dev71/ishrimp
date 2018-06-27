<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCicloTalla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciclo_talla', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ciclo_id');
            $table->foreign('ciclo_id')->references('id')->on('ciclos');
            $table->unsignedInteger('talla_id');
            $table->foreign('talla_id')->references('id')->on('tallas');
            $table->string('peso');
            $table->string('precio');
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
        Schema::dropIfExists('ciclo_talla');
    }
}
