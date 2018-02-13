<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblItemOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_item_order', function (Blueprint $table) {
            $table->increments('int_item_order_id');
            $table->unsignedInteger('int_io_order_id_fk');
            $table->unsignedInteger('int_io_item_id_fk');
            $table->integer('int_quantity');
            $table->text('txt_remarks')->nullable();

            $table->timestamps();

            $table->foreign('int_io_order_id_fk')
                  ->references('int_order_id')
                  ->on('tbl_order');

            $table->foreign('int_io_item_id_fk')
                  ->references('int_item_id')
                  ->on('tbl_item');
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::table('tbl_item_order', function (Blueprint $table) {
            $table->dropForeign(['int_io_order_id_fk']);
            $table->dropForeign(['int_io_item_id_fk']);
        });
        Schema::dropIfExists('tbl_item_order');
    }
}
