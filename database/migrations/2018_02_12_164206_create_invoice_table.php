<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_invoice', function (Blueprint $table) {
            $table->increments('int_invoice_id');
            $table->integer('int_invoice_order_id_fk')->unsigned();
            $table->double('dbl_total_amount', 11, 2);
            
            $table->timestamps();

            $table->foreign('int_invoice_order_id_fk')
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
        Schema::table('tbl_invoice', function (Blueprint $table) {
            $table->dropForeign(['int_invoice_order_id_fk']);
        });
        
        Schema::dropIfExists('tbl_invoice');
    }
}
