<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblservicearea', function (Blueprint $table) {
            $table->increments('intServAreaID');
            $table->unsignedInteger('intServAreaRefServTypeID');
            $table->string('strServAreaName', 45);
            $table->text('txtServAreaDesc', 50);
            $table->tinyInteger('intServAreaStatus');
            $table->timestamps();
            $table->softdeletes();

            $table->foreign('intServAreaRefServTypeID')->references('intServTypeID')->on('tblservicetype');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tblservicearea', function (Blueprint $table) {
            $table->dropForeign(['intServAreaRefServTypeID']);
        });
        Schema::dropIfExists('tblservicearea');
    }
}
