<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblvehicletype', function (Blueprint $table) {
            $table->increments('intVehicleTypeID');
            $table->string('strVehicleType', 45);
            $table->text('txtVehicleTypeDesc', 50);
            $table->tinyInteger('intVehicleTypeStatus')->default(1);
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblvehicletype');
    }
}
