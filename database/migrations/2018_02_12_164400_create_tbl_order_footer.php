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
            $table->string('str_delivery_type', 45);
            $table->unsignedInteger('int_of_terms_pay_id_fk');
            $table->unsignedInteger('int_of_mode_pay_id_fk');
            $table->unsignedInteger('int_of_downpayment_id_fk');
            $table->unsignedInteger('int_of_discount_id_fk');
            
            $table->timestamps();

            $table->foreign('int_of_order_id_fk')
                  ->references('int_order_id')
                  ->on('tbl_order');

            $table->foreign('int_of_terms_pay_id_fk')
                ->references('int_terms_pay_id')
                ->on('tbl_terms_payment');

            $table->foreign('int_of_mode_pay_id_fk')
                    ->references('int_mode_pay_id')
                    ->on('tbl_mode_payment');

            $table->foreign('int_of_downpayment_id_fk')
                ->references('int_downpayment_id')
                ->on('tbl_downpayment');

            $table->foreign('int_of_discount_id_fk')
                    ->references('int_discount_id')
                    ->on('tbl_discount');
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
            $table->dropForeign(['int_of_terms_pay_id_fk']);
            $table->dropForeign(['int_of_mode_pay_id_fk']);
            $table->dropForeign(['int_of_downpayment_id_fk']);
            $table->dropForeign(['int_of_discount_id_fk']);
        });
        Schema::dropIfExists('tbl_order_footer');
    }
}
