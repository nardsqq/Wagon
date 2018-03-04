<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveDownpaymentNameFromTblDownpayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_downpayment', function (Blueprint $table) {
            $table->dropColumn('str_down_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_downpayment', function (Blueprint $table) {
            $table->string('str_down_name', 45);
        });
    }
}
