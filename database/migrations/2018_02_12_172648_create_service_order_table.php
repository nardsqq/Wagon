<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_service_order', function (Blueprint $table) {
            $table->increments('int_service_order_id');
            $table->integer('int_so_order_id_fk')->unsigned();
            $table->integer('int_so_service_id_fk')->unsigned();
            $table->text('txt_remarks');
            $table->string('str_status', 45);
            
            $table->timestamps();

            $table->foreign('int_so_order_id_fk')
                  ->references('int_order_id')
                  ->on('tbl_oder');

            $table->foreign('int_so_service_id_fk')
                  ->references('int_service_id')
                  ->on('tbl_service');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_service_order', function (Blueprint $table) {
            $table->dropForeign(['int_so_order_id_fk']);
            $table->dropForeign(['int_so_service_id_fk']);
        });

        Schema::dropIfExists('tbl_service_order');
    }
}
