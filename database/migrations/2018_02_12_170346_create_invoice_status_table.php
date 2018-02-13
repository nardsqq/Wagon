<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_invoice_status', function (Blueprint $table) {
            $table->increments('int_invoice_status_id');
            $table->integer('int_instat_invoice_id_fk')->unsigned();
            $table->string('str_status', 45);
            
            $table->timestamps();
            $table->softdeletes();

            $table->foreign('int_instat_invoice_id_fk')
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
        Schema::table('tbl_invoice_status', function (Blueprint $table) {
            $table->dropForeign(['int_instat_invoice_id_fk']);
        });

        Schema::dropIfExists('tbl_invoice_status');
    }
}
