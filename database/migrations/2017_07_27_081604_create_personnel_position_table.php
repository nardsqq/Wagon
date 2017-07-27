<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblpersposition', function (Blueprint $table) {
            $table->increments('intPersPosID');
            $table->unsignedInteger('intPersPosRefPersID');
            $table->unsignedInteger('intPersPosRefDeptPosID');
            $table->tinyInteger('intDeptPosStatus');
            $table->timestamps();
            $table->softdeletes();

            $table->foreign('intPersPosRefPersID')->references('intPersonnelID')->on('tblpersonnel');
            $table->foreign('intPersPosRefDeptPosID')->references('intDeptPosID')->on('tbldeptposition');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tblpersposition', function (Blueprint $table) {
            $table->dropForeign(['intPersPosRefPersID']);
            $table->dropForeign(['intPersPosRefDeptPosID']);
        });
        Schema::dropIfExists('tblpersposition');
    }
}
