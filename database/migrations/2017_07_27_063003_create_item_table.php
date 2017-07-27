<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblitem', function (Blueprint $table) {
            $table->increments('intItemID');
            $table->unsignedInteger('intItemRefProdID');
            $table->unsignedInteger('intItemRefBrandID');
            $table->string('strItemModel', 45);
            $table->text('txtItemDesc', 50)->nullable();
            $table->tinyInteger('intItemStatus')->default(1);
            $table->timestamps();
            $table->softdeletes();

            $table->foreign('intItemRefProdID')->references('intProdID')->on('tblproduct');
            $table->foreign('intItemRefBrandID')->references('intBrandID')->on('tblbrand');
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
            $table->dropForeign(['intItemRefProdID']);
            $table->dropForeign(['intItemRefBrandID']);
        });
        Schema::dropIfExists('tblitem');
    }
}
