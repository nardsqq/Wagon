<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payment', function (Blueprint $table) {
            $table->increments('int_payment_id');
            $table->integer('int_paym_invoice_id_fk')->unsigned();
            $table->date('dat_date_received');
            $table->double('dbl_amount', 11, 2);
            $table->string('str_received_by', 45);

            $table->timestamps();

            $table->foreign('int_paym_invoice_id_fk')
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
        Schema::table('tbl_payment', function (Blueprint $table) {
            $table->dropForeign(['int_paym_invoice_id_fk']);
        });

        Schema::dropIfExists('tbl_payment');
    }
}
