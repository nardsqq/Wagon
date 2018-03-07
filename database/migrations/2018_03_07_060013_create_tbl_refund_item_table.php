<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblRefundItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_refund_item', function (Blueprint $table) {
            $table->increments('int_refund_item_id');
            $table->integer('int_ref_item_refund_id_fk')->unsigned();
            $table->integer('int_ref_item_item_order_id_fk')->unsigned();
            $table->integer('int_return_quantity');
            $table->boolean('is_returned');

            $table->timestamps();
            $table->softdeletes();

            $table->foreign('int_ref_item_refund_id_fk')
                ->references('int_refund_id')
                ->on('tbl_refund');

            $table->foreign('int_ref_item_item_order_id_fk')
                ->references('int_item_order_id')
                ->on('tbl_item_order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_refund_item', function (Blueprint $table) {
            $table->dropForeign(['int_ref_item_refund_id_fk']);
            $table->dropForeign(['int_ref_item_item_order_id_fk']);
        });

        Schema::dropIfExists('tbl_refund_item');
    }
}
