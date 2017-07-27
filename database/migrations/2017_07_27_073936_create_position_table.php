<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblposition', function (Blueprint $table) {
            $table->increments('intPositionID');
            $table->increments('intPositionDeptID');
            $table->string('strPositionName', 45);
            $table->text('txtPositionDesc', 50);
            $table->tinyInteger('intPositionStatus')->default(1);
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
        Schema::dropIfExists('tblposition');
    }
}
