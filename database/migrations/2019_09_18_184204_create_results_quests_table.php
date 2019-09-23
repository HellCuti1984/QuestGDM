<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsQuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results_quests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_stage')->unsigned()->default(1);
            $table->foreign('id_stage')->references('id')->on('stages');
            $table->bigInteger('id_user')->unsigned()->default(1);
            $table->foreign('id_user')->references('id')->on('users');
            $table->char('user_answer', 255)->nullable();
            $table->integer('user_points')->default(0)->nullable();
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
        Schema::dropIfExists('results_quests');
        schema::table('results_quest', function ($table){
            $table->dropForeign('id_stage');
            $table->dropColumn('id_stage');
            $table->dropForeign('id_user');
            $table->dropColumm('id_user');
        });
    }
}
