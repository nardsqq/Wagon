<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblvehicle', function (Blueprint $table) {
            $table->increments('intVehicleID');
            $table->unsignedInteger('intVehicleRefTypeID');
            $table->string('strVehicleModel', 45);
            $table->string('strVehiclePlateNo', 45);
            $table->unsignedInteger('intVehicleNetCapacity');
            $table->unsignedInteger('intVehicleGrossWeight');
            $table->tinyInteger('intVehicleStatus')->default(1);
            $table->timestamps();
            $table->softdeletes();

            $table->foreign('intVehicleRefTypeID')->references('intVehicleTypeID')->on('tblvehicletype');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tblproduct', function (Blueprint $table) {
            $table->dropForeign(['intVehicleRefTypeID']);
        });
        Schema::dropIfExists('tblvehicle');
    }
}
