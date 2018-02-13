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
            $table->string('str_specs_name', 45);
            $table->string('str_specs_uom', 45)->nullable();
            
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
		Schema::dropIfExists('tbl_specs');
    }
}
