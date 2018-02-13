<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefundReleaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_refund_release', function (Blueprint $table) {
            $table->increments('int_refund_release_table_id');
            $table->integer('int_rs_refund_request_id_fk')->unsigned();
            $table->string('str_received_by', 45);
            $table->date('dat_date_received');

            $table->timestamps();

            $table->foreign('int_rs_refund_request_id_fk')
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
        Schema::table('tbl_refund_release', function (Blueprint $table) {
            $table->dropForeign(['int_rs_refund_request_id_fk']);
        });
        Schema::dropIfExists('tbl_refund_release');
    }
}
