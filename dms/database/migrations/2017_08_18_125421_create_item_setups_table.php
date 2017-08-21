<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemSetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_setups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('activity_setup_id')->references('id')->on('activity_setup');
            $table->string('name',50);
            $table->smallInteger('severity');
            $table->smallInteger('used_in');
            $table->softDeletes();
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
        Schema::dropIfExists('item_setups');
    }
}
