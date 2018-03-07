<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblRefundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_refund', function (Blueprint $table) {
            $table->increments('int_refund_id');
            $table->integer('int_refund_invoice_id_fk')->unsigned();
            $table->string('str_received_by', 45);
            $table->timestamp('tms_date_refunded');

            $table->timestamps();
            $table->softdeletes();

            $table->foreign('int_refund_invoice_id_fk')
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
        Schema::table('tbl_refund', function (Blueprint $table) {
            $table->dropForeign(['int_refund_invoice_id_fk']);
        });

        Schema::dropIfExists('tbl_refund');
    }
}
