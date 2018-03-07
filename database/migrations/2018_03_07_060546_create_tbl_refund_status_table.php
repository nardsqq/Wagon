<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblRefundStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_refund_status', function (Blueprint $table) {
            $table->increments('int_refund_status_id');
            $table->integer('int_rstat_refund_id_fk')->unsigned();
            $table->string('str_status', 45);
            $table->timestamp('tms_as_of');

            $table->timestamps();
            $table->softdeletes();

            $table->foreign('int_rstat_refund_id_fk')
                ->references('int_refund_id')
                ->on('tbl_refund');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_refund_status', function (Blueprint $table) {
            $table->dropForeign(['int_rstat_refund_id_fk']);
        });

        Schema::dropIfExists('tbl_refund_status');
    }
}
