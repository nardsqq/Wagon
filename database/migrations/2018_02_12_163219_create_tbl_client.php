<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('tbl_client', function (Blueprint $table) {
			$table->increments('int_client_id');
			$table->string('str_client_name', 45);
			$table->string('str_client_person', 45);
			$table->text('txt_client_address');
			$table->string('str_client_landmark', 45);
			$table->string('str_client_tin', 45);
			$table->string('str_client_mobile_num', 45);
			$table->string('str_client_tel_num', 45);
			$table->string('str_client_email', 45);
            
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
		Schema::dropIfExists('tbl_client');
	}
}
