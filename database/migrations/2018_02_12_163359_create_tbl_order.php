<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
		 public function up()
  		{
  		 Schema::create('tbl_order', function (Blueprint $table) {
  			 $table->increments('int_order_id');
				 $table->string('str_purc_order_num', 45);
  			 $table->unsignedInteger('int_order_client_id_fk');
				 $table->date('dat_order_date');
				 $table->text('txt_deli_address');
				 $table->text('txt_bill_address');
				 $table->string('str_landmark', 45)->nullable();
				 $table->string('str_contact_num', 45);
				 $table->string('str_contact_person', 45);
				 $table->timestamps();
	       $table->softdeletes();

				 $table->foreign('int_order_client_id_fk')->references('int_client_id')->on('tbl_client');
  		 });
  		}

  		/**
  		 * Reverse the migrations.
  		 *
  		 * @return void
  		 */
  		public function down()
  		{
				Schema::table('tbl_order', function (Blueprint $table) {
					$table->dropForeign(['int_order_client_id_fk']);
				});
  		 Schema::dropIfExists('tbl_order');
  		}
}
