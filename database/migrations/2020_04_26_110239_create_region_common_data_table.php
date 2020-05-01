<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionCommonDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_common_data', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('date');
            $table->integer('infected')->unsigned()->default(0);
            $table->integer('recovered')->unsigned()->default(0);
            $table->integer('dead')->unsigned()->default(0);
            $table->integer('tested')->unsigned()->default(0);
            $table->integer('isolated')->unsigned()->default(0);

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
        Schema::dropIfExists('region_common_data');
    }
}
