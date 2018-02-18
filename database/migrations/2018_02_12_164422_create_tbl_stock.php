<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('tbl_stock', function (Blueprint $table) {
			$table->increments('int_stock_id');
			$table->unsignedInteger('int_stock_var_id_fk');
			$table->integer('int_quantity');
			
			$table->timestamps();

			$table->foreign('int_stock_var_id_fk')
				->references('int_var_id')
				->on('tbl_variation');
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::table('tbl_stock', function (Blueprint $table) {
			$table->dropForeign(['int_stock_var_id_fk']);
		});
		Schema::dropIfExists('tbl_stock');
	}
}
