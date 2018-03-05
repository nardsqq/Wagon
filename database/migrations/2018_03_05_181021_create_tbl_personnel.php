<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPersonnel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_personnel', function (Blueprint $table) {
            $table->increments('int_personnel_id');
            $table->unsignedInteger('int_pers_position_id_fk');
            $table->string('str_personnel_type', 45);
            $table->string('str_personnel_l_name', 45);
            $table->string('str_personnel_f_name', 45);
            $table->string('str_personnel_m_name', 45)->nullable();
            $table->text('txt_personnel_address');
            $table->string('str_personnel_mobile_num', 45);
            
            $table->timestamps();
            $table->softdeletes();

            $table->foreign('int_pers_position_id_fk')
                  ->references('int_position_id')
                  ->on('tbl_position');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('tbl_personnel', function (Blueprint $table) {
          $table->dropForeign(['int_pers_position_id_fk']);
      });
        
        Schema::dropIfExists('tbl_personnel');
    }
}