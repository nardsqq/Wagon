<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSpecs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('tbl_specs', function (Blueprint $table) {
            $table->increments('int_specs_id');
            $table->unsignedInteger('int_spec_var_id_fk');
            $table->unsignedInteger('int_spec_pa_id_fk');
            $table->string('str_spec_constant', 45);
            
            $table->timestamps();
            $table->softdeletes();

            $table->foreign('int_spec_var_id_fk')
                  ->references('int_var_id')
                  ->on('tbl_variation');
            $table->foreign('int_spec_pa_id_fk')
                  ->references('int_prod_attrib_id')
                  ->on('tbl_prod_attrib');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_specs', function (Blueprint $table) {
            $table->dropForeign(['int_spec_var_id_fk']);
            $table->dropForeign(['int_spec_pa_id_fk']);
        });
		Schema::dropIfExists('tbl_specs');
    }
}
