<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbldeptposition', function (Blueprint $table) {
            $table->increments('intDeptPosID');
            $table->unsignedInteger('intDeptPosRefDeptID');
            $table->unsignedInteger('intDeptPosRefPosID');
            $table->tinyInteger('intDeptPosStatus');
            $table->timestamps();
            $table->softdeletes();

            $table->foreign('intDeptPosRefDeptID')->references('intDepartmentID')->on('tbldepartment');
            $table->foreign('intDeptPosRefPosID')->references('intPositionID')->on('tblposition');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbldeptposition', function (Blueprint $table) {
            $table->dropForeign(['intDeptPosRefDeptID']);
            $table->dropForeign(['intDeptPosRefPosID']);
        });
        Schema::dropIfExists('tbldeptposition');
    }
}
