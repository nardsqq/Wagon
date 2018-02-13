<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblVariation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_variation', function (Blueprint $table) {
            $table->increments('int_var_id');
            $table->unsignedInteger('int_var_item_id_fk');
            $table->unsignedInteger('int_specs_id_fk');
            $table->string('str_specs_contant', 45);

            $table->timestamps();
            $table->softdeletes();

            $table->foreign('int_var_item_id_fk')
                  ->references('int_item_id')
                  ->on('tbl_item');

            $table->foreign('int_specs_id_fk')
                  ->references('int_specs_id')
                  ->on('tbl_specs');
        });
    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('tbl_variation', function (Blueprint $table) {
            $table->dropForeign(['int_var_item_id_fk']);
            $table->dropForeign(['int_specs_id_fk']);
        });
	    Schema::dropIfExists('tbl_variation');
	}
}
