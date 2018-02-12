<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
		public function up()
 		{
 		 Schema::create('tbl_service', function (Blueprint $table) {
 			 $table->increments('int_service_id');
			 $table->string('str_service_name', 45);
 			 $table->double('dbl_service_price', 11, 2);
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
 		 Schema::dropIfExists('tbl_service');
 		}
}
