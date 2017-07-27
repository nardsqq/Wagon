<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbldepartment', function (Blueprint $table) {
            $table->increments('intDepartmentID');
            $table->string('strDepartmentName', 45);
            $table->text('txtDepartmentDesc', 50);
            $table->tinyInteger('intDepartmentStatus')->default(1);
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
        Schema::dropIfExists('tbldepartment');
    }
}
