<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
	{
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->increments('int_product_id');
            $table->string('str_product_name', 45);
            
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
	   Schema::dropIfExists('tbl_product');
	}
}
