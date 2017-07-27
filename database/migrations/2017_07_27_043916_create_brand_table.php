<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblbrand', function (Blueprint $table) {
            $table->increments('intBrandID');
            $table->string('strBrandName', 45);
            $table->text('txtBrandDesc', 50)->nullable();
            $table->tinyInteger('intBrandStatus')->default(1);
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
        Schema::dropIfExists('tblbrand');
    }
}
