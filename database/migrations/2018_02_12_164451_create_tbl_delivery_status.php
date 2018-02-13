<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblDeliveryStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('tbl_delivery_status', function (Blueprint $table) {
			$table->increments('int_delivery_status_id');
			$table->unsignedInteger('int_delstat_delivery_id_fk');
			$table->string('str_status', 45);

			$table->timestamps();

			$table->foreign('int_delstat_delivery_id_fk')
				->references('int_delivery_id')
				->on('tbl_delivery');
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::table('tbl_delivery_status', function (Blueprint $table) {
			$table->dropForeign(['int_delstat_delivery_id_fk']);
		});
		Schema::dropIfExists('tbl_delivery_status');
	}
}
