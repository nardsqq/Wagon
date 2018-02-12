<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
		 public function up()
  		{
  		 Schema::create('tbl_item', function (Blueprint $table) {
  			 $table->increments('int_item_id');
				 $table->unsignedInteger('int_product_id_fk');
				 $table->unsignedInteger('int_brand_id_fk');
				 $table->integer('int_quant_instock');
				 $table->timestamps();
	       $table->softdeletes();

				 $table->foreign('int_product_id_fk')->references('int_product_id')->on('tbl_product');
				 $table->foreign('int_brand_id_fk')->references('int_brand_id')->on('tbl_brand');
  		 });
  		}

  		/**
  		 * Reverse the migrations.
  		 *
  		 * @return void
  		 */
  		public function down()
  		{
				Schema::table('tbl_item', function (Blueprint $table) {
					$table->dropForeign(['int_product_id_fk']);
					$table->dropForeign(['int_brand_id_fk']);
				});
  		 Schema::dropIfExists('tbl_item');
  		}
}
