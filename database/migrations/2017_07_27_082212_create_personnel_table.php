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
        Schema::create('tblpersonnel', function (Blueprint $table) {
            $table->increments('intPersID');
            $table->string('strPersFName', 45);
            $table->string('strPersMName', 45)->nullable();
            $table->string('strPersLName', 45);
            $table->tinyInteger('intPersEmpType');
            $table->tinyInteger('intPersStatus');
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
        Schema::dropIfExists('tblpersonnel');
    }
}
