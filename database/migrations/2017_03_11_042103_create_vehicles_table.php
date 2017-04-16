<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
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
            $table->integer('intVehicleTypeNum');
            $table->string('strVehicleModel');
            $table->string('strVehiclePlateNumber');
            $table->integer('intVehicleNetCapacity');
            $table->integer('intVehicleGrossWeight');
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
        Schema::dropIfExists('tblvehicle');
    }
}
