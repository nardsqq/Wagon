<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefundRequestSignatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ref_req_signature', function (Blueprint $table) {
            $table->increments('int_ref_req_signature_id');
            $table->integer('int_rrsig_refund_request_id_fk')->unsigned();
            $table->string('str_signature_type', 45);
            $table->string('str_signed_by', 45);

            // Confirm ko pa with Tyron to. Baka pwede na created_at.
            // $table->date('dat_date_signed');

            $table->timestamps();
            $table->softdeletes();

            $table->foreign('int_rrsig_refund_request_id_fk')
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
        Schema::table('tbl_ref_req_signature', function (Blueprint $table) {
            $table->dropForeign(['int_rrsig_refund_request_id_fk']);
        });

        Schema::dropIfExists('tbl_ref_req_signature');
    }
}
