<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('tbl_material', function (Blueprint $table) {
            $table->increments('int_material_id');
            $table->unsignedInteger('int_mat_service_id_fk');
            $table->unsignedInteger('int_mat_item_id_fk');
            
            $table->timestamps();

            $table->foreign('int_mat_service_id_fk')
                ->references('int_service_id')
                ->on('tbl_service');

            $table->foreign('int_mat_item_id_fk')
                ->references('int_item_id')
                ->on('tbl_item');
         });
     }
 
     /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_material', function (Blueprint $table) {
            $table->dropForeign(['int_mat_service_id_fk']);
            $table->dropForeign(['int_mat_item_id_fk']);
        });
        Schema::dropIfExists('tbl_material');
    }
}
