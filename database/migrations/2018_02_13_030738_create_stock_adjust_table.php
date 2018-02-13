<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockAdjustTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_stock_adjust', function (Blueprint $table) {
            $table->increments('int_stock_adjust_id');
            $table->integer('int_sa_item_id_fk')->unsigned();
            $table->integer('int_quantity');
            $table->string('str_action', 45);
            $table->text('txt_reason');

            $table->timestamps();
            $table->softdeletes();

            $table->foreign('int_sa_item_id_fk')
                  ->references('int_service_order_id')
                  ->on('tbl_service_order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_stock_adjust', function (Blueprint $table) {
            $table->dropForeign(['int_sa_item_id_fk']);
        });

        Schema::dropIfExists('tbl_stock_adjust');
    }
}
