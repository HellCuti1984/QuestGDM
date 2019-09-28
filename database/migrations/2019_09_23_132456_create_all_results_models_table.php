<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllResultsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_results_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('stage_1')->default(0);
            $table->integer('stage_2')->default(0);
            $table->integer('stage_3')->default(0);
            $table->integer('stage_4')->default(0);
            $table->integer('stage_5')->default(0);
            $table->integer('stage_6')->default(0);
            $table->integer('stage_7')->default(0);
            $table->integer('resutls')->default(0);
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
        Schema::dropIfExists('all_results_models');
    }
}
