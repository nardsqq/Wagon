<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblinventory', function (Blueprint $table) {
            $table->increments('intInventoryID');
            $table->unsignedInteger('intInvenRefItemID');
            $table->integer('intItemInStock');
            $table->timestamps();

            $table->foreign('intInvenRefItemID')->references('intItemID')->on('tblitem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tblinventory', function (Blueprint $table) {
            $table->dropForeign(['intInvenRefItemID']);
        });
        Schema::dropIfExists('tblinventory');
    }
}
