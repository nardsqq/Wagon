<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblservicetype', function (Blueprint $table) {
            $table->increments('intServTypeID');
            $table->tinyInteger('intServCategory');
            $table->string('intServTypeName', 45);
            $table->text('txtServTypeDesc', 50);
            $table->tinyInteger('intServTypeStatus');
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
        Schema::dropIfExists('tblservicetype');
    }
}
