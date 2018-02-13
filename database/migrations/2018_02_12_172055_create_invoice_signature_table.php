<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceSignatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_invoice_signature', function (Blueprint $table) {
            $table->increments('int_invoice_signature_id');
            $table->integer('int_insig_invoice_id_fk')->unsigned();
            $table->string('str_signature_type', 45);
            $table->string('str_signed_by', 45);
            
            $table->timestamps();
            $table->softdeletes();

            // Kailangan ko pa i-confirm kay Tyron if user input yung "date signed"
            // Timestamps muna for the meantime (created_at)
            // $table->date('dat_date_signed');

            $table->foreign('int_insig_invoice_id_fk')
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
        Schema::table('tbl_invoice_signature', function(Blueprint $table) {
            $table->dropForeign(['int_insig_invoice_id_fk']);
        });

        Schema::dropIfExists('tbl_invoice_signature');
    }
}
