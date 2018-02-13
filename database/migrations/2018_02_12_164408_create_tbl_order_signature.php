<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblOrderSignature extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order_signature', function (Blueprint $table) {
            $table->increments('int_order_signature_id');
            $table->unsignedInteger('int_orsig_order_id_fk');
            $table->string('str_signature_type', 45);
            $table->string('str_signed_by', 45);
            $table->date('dat_date_signed');
            
            $table->timestamps();

            $table->foreign('int_orsig_order_id_fk')
                ->references('int_order_id')
                ->on('tbl_order');
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::table('tbl_order_signature', function (Blueprint $table) {
            $table->dropForeign(['int_orsig_order_id_fk']);
        });
        Schema::dropIfExists('tbl_order_signature');
    }
 }
 