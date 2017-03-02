<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_skills', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id');
            $table->string('skill_json')->comment('{skill_id: , level: , point: }');
            $table->string('status')->default(0)->comment('0- chưa xong, 1- đã xong');
            $table->string('test_id');
            $table->integer('point');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_skills');
    }
}
