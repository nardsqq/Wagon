<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblPersonnel', function (Blueprint $table) {
            $table->increments('intPersID');
            $table->string('strPersFName', 45);
            $table->string('strPersMName', 45);
            $table->string('strPersLName', 45);
            $table->boolean('boolPersGender');
            $table->integer('intPersDeptID');
            $table->integer('intPersPosID');
            $table->string('strPersAddress');
            $table->string('strPersContactNumber', 11);
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
        Schema::dropIfExists('tblPersonnel');
    }
}
