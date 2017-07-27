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
        Schema::table('tblproductcategory', function (Blueprint $table) {
            $table->increments('intProdCateg');
            $table->string('strProdCategName');
            $table->text('txtProdCategDesc');
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
        Schema::table('tblproductcategory', function (Blueprint $table) {
            Schema::dropIfExists('tblproductcategory');
        });
    }
}
