<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceSchedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_service_sched', function (Blueprint $table) {
            $table->increments('int_sched_id');
            $table->integer('int_ss_service_order_id_fk')->unsigned();
            $table->date('dat_start');
            $table->date('dat_end');

            $table->timestamps();
            $table->softdeletes();

            $table->foreign('int_ss_service_order_id_fk')
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
        Schema::table('tbl_service_sched', function (Blueprint $table) {
            $table->dropForeign(['int_ss_service_order_id_fk']);
        });
        Schema::dropIfExists('tbl_service_sched');
    }
}
