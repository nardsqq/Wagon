<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVarColumnToServiceMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_service_materials', function (Blueprint $table) {
            $table->integer('int_sm_var_id_fk')->unsigned();
                  
            $table->foreign('int_sm_var_id_fk')
                ->references('int_var_id')
                ->on('tbl_variation');
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
            $table->dropForeign(['int_sm_var_id_fk']);
        });
    }
}
