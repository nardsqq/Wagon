<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblServiceDesc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
		 public function up()
  		{
  		 Schema::create('tbl_service_desc', function (Blueprint $table) {
				 $table->increments('int_service_desc_id');
  			 $table->unsignedInteger('int_sd_service_id_fk');
  			 $table->string('str_service_desc_desc', 45);
				 $table->timestamps();
	       $table->softdeletes();
				 
				 $table->foreign('int_sd_service_id_fk')->references('int_service_id')->on('tbl_service');
  		 });
  		}

  		/**
  		 * Reverse the migrations.
  		 *
  		 * @return void
  		 */
  		public function down()
  		{
				Schema::table('tbl_service_desc', function (Blueprint $table) {
					$table->dropForeign(['int_sd_service_id_fk']);
				});
  		 Schema::dropIfExists('tbl_service_desc');
  		}
}
