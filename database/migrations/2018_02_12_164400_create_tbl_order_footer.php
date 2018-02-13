<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblOrderFooter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order_footer', function (Blueprint $table) {
            $table->increments('int_order_footer_id');
            $table->unsignedInteger('int_of_order_id_fk');
            $table->integer('int_payment_terms');
            $table->string('str_payment_mode', 45);
            $table->string('str_delivery_type', 45);
            $table->integer('int_discount')->nullable();
            $table->double('dbl_downpayment', 11, 2);
            
            $table->timestamps();

            $table->foreign('int_of_order_id_fk')
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
        Schema::table('tbl_order_footer', function (Blueprint $table) {
            $table->dropForeign(['int_of_order_id_fk']);
        });
        Schema::dropIfExists('tbl_order_footer');
    }
}
