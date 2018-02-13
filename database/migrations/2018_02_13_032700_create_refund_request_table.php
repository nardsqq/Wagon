<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefundRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_refund_request', function (Blueprint $table) {
            $table->increments('int_refund_request_id');
            $table->integer('int_rr_invoice_id_fk')->unsigned();
            $table->string('str_refund_type', 45);
            $table->string('str_status', 45);

            $table->timestamps();

            $table->foreign('int_rr_invoice_id_fk')
                  ->references('int_invoice_id')
                  ->on('tbl_invoice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_refund_request' function (Blueprint $table) {
            $table->dropForeign(['int_rr_invoice_id_fk']);
        });

        Schema::dropIfExists('tbl_refund_request');
    }
}
