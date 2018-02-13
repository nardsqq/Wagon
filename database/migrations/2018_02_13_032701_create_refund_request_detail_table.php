<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefundRequestDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_refund_request_detail', function (Blueprint $table) {
            $table->increments('int_ref_request_detail_id');
            $table->integer('int_rrdet_refund_request_id_fk')->unsigned();
            $table->integer('int_rrdet_item_order_id_fk')->unsigned();
            $table->integer('int_quantity');
            $table->string('str_condition', 45);

            $table->timestamps();
            $table->softdeletes();

            $table->foreign('int_rrdet_refund_request_id_fk')
                  ->references('int_refund_request_id')
                  ->on('tbl_refund_request');

            $table->foreign('int_rrdet_item_order_id_fk')
                  ->references('int_item_order_id')
                  ->on('tbl_item_order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_refund_request_detail', function (Blueprint $table) {
            $table->dropForeign(['int_rrdet_refund_request_id_fk']);
            $table->dropForeign(['int_rrdet_item_order_id_fk']);
        });

        Schema::dropIfExists('tbl_refund_request_detail');
    }
}
