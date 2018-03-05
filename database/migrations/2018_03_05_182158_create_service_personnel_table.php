<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicePersonnelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_service_personnel', function (Blueprint $table) {
            $table->increments('int_serv_pers_id');
            $table->integer('int_schedule_id_fk')->unsigned();
            $table->integer('int_personnel_id_fk')->unsigned();
            $table->text('txt_remarks');

            $table->timestamps();
            $table->softdeletes();

            $table->foreign('int_schedule_id_fk')
                  ->references('int_sched_id')
                  ->on('tbl_service_sched');

            $table->foreign('int_personnel_id_fk')
                  ->references('int_personnel_id')
                  ->on('tbl_personnel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_service_personnel', function (Blueprint $table) {
            $table->dropForeign(['int_schedule_id_fk']);
            $table->dropForeign(['int_personnel_id_fk']);
        });

        Schema::dropIfExists('tbl_service_personnel');
    }
}
