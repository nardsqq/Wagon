<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSupplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
		 public function up()
  		{
  		 Schema::create('tbl_supplier', function (Blueprint $table) {
  			 $table->increments('int_supplier_id');
  			 $table->string('str_supplier_name', 45);
				 $table->text('txt_supplier_address');
				 $table->string('str_supplier_mobile_num', 45);
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
  		 Schema::dropIfExists('tbl_supplier');
  		}
}
