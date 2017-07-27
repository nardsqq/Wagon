<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblproductcategory', function (Blueprint $table) {
            $table->increments('intProdCategID');
            $table->string('strProdCategName', 45);
            $table->text('txtProdCategDesc', 50)->nullable();
            $table->tinyInteger('intProdCategStatus')->default(1);
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
        Schema::dropIfExists('tblproductcategory');
    }
}
