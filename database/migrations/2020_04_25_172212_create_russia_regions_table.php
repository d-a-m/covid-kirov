<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRussiaRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('russia_regions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('slug');
            $table->integer('total')->unsigned()->default(0);
            $table->integer('new')->unsigned()->default(0);
            $table->string('coords')->default('');

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
        Schema::dropIfExists('russia_regions');
    }
}
