<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_service_materials', function (Blueprint $table) {
            $table->increments('int_serv_mat_id');
            $table->integer('int_sm_service_order_id_fk')->unsigned();
            $table->integer('int_quantity');
            $table->tinyInteger('int_acqui_type');

            $table->timestamps();
            $table->softdeletes();

            $table->foreign('int_sm_service_order_id_fk')
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
        Schema::table('tbl_service_materials', function (Blueprint $table) {
            $table->dropForeign(['int_sm_service_order_id_fk']);
        });

        Schema::dropIfExists('tbl_service_materials');
    }
}
