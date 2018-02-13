<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblOrderStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order_status', function (Blueprint $table) {
            $table->increments('int_order_status_id');
            $table->unsignedInteger('int_orstat_order_id_fk');
            $table->string('str_status', 45);

            $table->timestamps();
            $table->softdeletes();

            $table->foreign('int_orstat_order_id_fk')
                  ->references('int_order_id')
                  ->on('tbl_order');
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::table('tbl_order_status', function (Blueprint $table) {
            $table->dropForeign(['int_orstat_order_id_fk']);
        });
        Schema::dropIfExists('tbl_order_status');
    }
}
