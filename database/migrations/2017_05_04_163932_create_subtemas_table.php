z<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubtemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtemas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo',100);
            $table->text('texto');
            $table->integer('tema_id')->unsigned();
            $table->foreign('tema_id')->references('id')->on('temas')->onDelete('cascade');
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
        Schema::drop('subtemas');
    }
}
