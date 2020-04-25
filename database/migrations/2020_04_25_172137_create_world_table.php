<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('world', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('infected')->unsigned()->default(0);
            $table->integer('recovered')->unsigned()->default(0);
            $table->integer('died')->unsigned()->default(0);
            $table->text('chart_total')->nullable();
            $table->text('chart_diff')->nullable();

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
        Schema::dropIfExists('world');
    }
}
