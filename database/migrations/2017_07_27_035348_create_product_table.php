<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblproduct', function (Blueprint $table) {
            $table->increments('intProdID');
            $table->unsignedInteger('intProdRefCategID');
            $table->string('strProdName', 45);
            $table->text('txtProdDesc', 50);
            $table->unsignedInteger('intProdLevel');
            $table->tinyInteger('intProdCategStatus')->default(1);
            $table->timestamps();
            $table->softdeletes();

            $table->foreign('intProdRefCategID')->references('intProdCateg')->on('tblproductcategory');
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
            $table->dropForeign(['intProdRefCategID']);
        });
        Schema::dropIfExists('tblproduct');
    }
}
