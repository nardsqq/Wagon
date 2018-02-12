<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblItemPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
		 public function up()
  		{
  		 Schema::create('tbl_item_price', function (Blueprint $table) {
  			 $table->increments('int_item_price_id');
				 $table->unsignedInteger('int_ip_item_id_fk');
  			 $table->double('dbl_price', 11, 2);
				 $table->timestamps();
	       $table->softdeletes();

				 $table->foreign('int_ip_item_id_fk')->references('int_item_id')->on('tbl_item');

  		 });
  		}

  		/**
  		 * Reverse the migrations.
  		 *
  		 * @return void
  		 */
  		public function down()
  		{
				Schema::table('tbl_item_price', function (Blueprint $table) {
					$table->dropForeign(['int_ip_item_id_fk']);
				});
  		 Schema::dropIfExists('tbl_item_price');
  		}
}
