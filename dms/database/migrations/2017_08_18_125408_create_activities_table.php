<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('recruitment_id')->references('id')->on('recruitment');
            $table->integer('user_id')->references('id')->on('user');
            $table->integer('activity_setup_id')->references('id')->on('activity_setup');
            $table->smallInteger('status');
            $table->date('end_date');
            $table->string('comment',100);
            $table->string('recommendation',100);
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
        Schema::dropIfExists('activities');
    }
}
