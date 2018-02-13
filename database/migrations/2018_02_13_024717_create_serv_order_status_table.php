<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServOrderStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_serv_order_status', function (Blueprint $table) {
            $table->increments('int_serv_order_status');
            $table->integer('int_sos_service_order_id_fk')->unsigned();
            $table->string('str_status', 45);

            $table->timestamps();

            $table->foreign('int_sos_service_order_id_fk')
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
        Schema::table('tbl_serv_order_status', function (Blueprint $table) {
            $table->dropForeign(['int_sos_service_order_id_fk']);
        });

        Schema::dropIfExists('tbl_serv_order_status');
    }
}
