<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('respuesta1');
            $table->string('respuesta2');
            $table->string('respuesta3');
            $table->string('respuesta4');
            $table->integer('respuesta_correcta');
            $table->integer('pregunta_id')->unsigned();
            $table->foreign('pregunta_id')->references('id')->on('preguntas')->onDelete('cascade')->onUpdate('cascade');
          //  $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('respuestas');
    }
}
