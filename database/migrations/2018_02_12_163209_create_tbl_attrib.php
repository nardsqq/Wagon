<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblAttrib extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
	{
        Schema::create('tbl_attrib', function (Blueprint $table) {
            $table->increments('int_attrib_id');
            $table->string('str_attrib_name', 45);
            
            $table->timestamps();
            $table->softdeletes();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	   Schema::dropIfExists('tbl_attrib');
	}
}
