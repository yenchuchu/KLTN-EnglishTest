<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnderlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('underlines', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('content');
            $table->integer('point');
            $table->integer('skill_id')->nullable();
            $table->integer('level_id')->nullable();

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
        Schema::dropIfExists('underlines');
    }
}
