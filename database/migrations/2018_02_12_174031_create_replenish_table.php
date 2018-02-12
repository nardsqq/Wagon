<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplenishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_replenish', function (Blueprint $table) {
            $table->increments('int_replenish_id');
            $table->integer('int_supplier_id_fk')->unsigned();
            $table->string('str_pur_order_num', 45);
            $table->date('dat_date_received');

            $table->timestamps();

            $table->foreign('int_supplier_id_fk')
                  ->references('int_supplier_id')
                  ->on('tbl_supplier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_replenish', function (Blueprint $table) {
            $table->dropForeign(['int_supplier_id_fk']);
        });

        Schema::dropIfExists('tbl_replenish');
    }
}
