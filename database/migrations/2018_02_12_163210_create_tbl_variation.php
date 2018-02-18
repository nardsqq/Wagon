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
            $table->unsignedInteger('int_prod_id_fk');

            $table->timestamps();
            $table->softdeletes();

            $table->foreign('int_prod_id_fk')
                  ->references('int_product_id')
                  ->on('tbl_product');
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
            $table->dropForeign(['int_prod_id_fk']);
        });
	    Schema::dropIfExists('tbl_variation');
	}
}
