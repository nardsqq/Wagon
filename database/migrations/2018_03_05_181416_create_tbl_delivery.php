<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblDelivery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_delivery', function (Blueprint $table) {
        $table->increments('int_delivery_id');
        $table->unsignedInteger('int_del_order_id_fk');
        $table->unsignedInteger('int_del_personnel_id_fk')->nullable();
        $table->string('str_delivery_no')->nullable();
        $table->date('dat_delivery_date')->nullable();

        $table->timestamps();

        $table->foreign('int_del_order_id_fk')
            ->references('int_order_id')
            ->on('tbl_order');

        $table->foreign('int_del_personnel_id_fk')
            ->references('int_personnel_id')
            ->on('tbl_personnel');
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::table('tbl_delivery', function (Blueprint $table) {
            $table->dropForeign(['int_del_order_id_fk']);
            $table->dropForeign(['int_del_personnel_id_fk']);
        });
        Schema::dropIfExists('tbl_delivery');
    }
}
