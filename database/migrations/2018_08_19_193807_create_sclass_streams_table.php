<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSclassStreamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sclass_streams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sclass_id')->unsigned();
            $table->integer('stream_id')->unsigned();
            $table->timestamps();

            $table->foreign('sclass_id')->references('id')->on('sclasses');
            $table->foreign('stream_id')->references('id')->on('streams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sclass_streams');
    }
}
