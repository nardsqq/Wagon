<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblReplDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_repl_detail', function (Blueprint $table) {
        $table->increments('int_repl_item_id');
        $table->unsignedInteger('int_replenish_id_fk');
        $table->unsignedInteger('int_repl_item_id_fk');
        $table->integer('int_quantity');
        $table->double('dbl_unit_price', 11, 2);

        $table->timestamps();

        $table->foreign('int_replenish_id_fk')
            ->references('int_replenish_id')
            ->on('tbl_replenish');
        });

        $table->foreign('int_repl_item_id_fk')
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
        Schema::table('tbl_repl_detail', function (Blueprint $table) {
            $table->dropForeign(['int_replenish_id_fk']);
            $table->dropForeign(['int_repl_item_id_fk']);
        });
        Schema::dropIfExists('tbl_repl_detail');
    }
}
