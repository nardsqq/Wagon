<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblBrand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
    {
        Schema::create('tbl_brand', function (Blueprint $table) {
            $table->increments('int_brand_id');
            $table->string('str_brand_name', 45);
            
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
		Schema::dropIfExists('tbl_brand');
    }
}
