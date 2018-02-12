<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_contact_detail', function (Blueprint $table) {
            $table->increments('int_contact_id');
            $table->integer('int_cd_client_id_fk')->unsigned();
            $table->string('str_contact_type', 45);
            $table->string('str_contact_detail', 45);

            $table->timestamps();

            $table->foreign('int_cd_client_id_fk')
                  ->references('int_client_id')
                  ->on('tbl_client');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_contact_detail', function (Blueprint $table) {
            $table->dropForeign(['int_cd_client_id_fk']);
        });
        
        Schema::dropIfExists('tbl_contact_detail');
    }
}
