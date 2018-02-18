<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProdAttrib extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
	{
        Schema::create('tbl_prod_attrib', function (Blueprint $table) {
            $table->increments('int_prod_attrib_id');
            $table->unsignedInteger('int_pa_prod_id_fk');
            $table->unsignedInteger('int_pa_attrib_id_fk');
            
            $table->timestamps();
            $table->softdeletes();
            
            $table->foreign('int_pa_prod_id_fk')
                  ->references('int_product_id')
                  ->on('tbl_product');
            $table->foreign('int_pa_attrib_id_fk')
                  ->references('int_attrib_id')
                  ->on('tbl_attrib');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('tbl_prod_attrib', function (Blueprint $table) {
            $table->dropForeign(['int_pa_prod_id_fk']);
            $table->dropForeign(['int_pa_attrib_id_fk']);
        });
	   Schema::dropIfExists('tbl_prod_attrib');
	}
}
