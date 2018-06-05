<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiscinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piscinas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('finca_id');
            $table->foreign('finca_id')->references('id')->on('fincas');
            $table->string('area');
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
        Schema::dropIfExists('piscinas');
    }
}
