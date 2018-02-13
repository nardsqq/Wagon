<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefundRequestStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ref_req_status', function (Blueprint $table) {
            $table->increments('int_ref_req_status_id');
            $table->integer('int_rrstat_refund_request_id_fk')->unsigned();
            $table->string('str_status', 45);

            $table->timestamps();

            $table->foreign('int_rrstat_refund_request_id_fk')
                  ->references('int_refund_request_id')
                  ->on('tbl_refund_request');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_ref_req_status', function (Blueprint $table) {
            $table->dropForeign(['int_rrstat_refund_request_id_fk']);
        });

        Schema::dropIfExists('tbl_ref_req_status');
    }
}
