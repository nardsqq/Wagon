<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblprice', function (Blueprint $table) {
            $table->increments('intPriceID');
            $table->unsignedInteger('intPriceRefInvenID');
            $table->decimal('dblPriceVal', 11, 2);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->softdeletes();
        });

        DB::statement('ALTER TABLE  `tblprice` DROP PRIMARY KEY , ADD PRIMARY KEY (  `intPriceID` ,  `created_at` ) ;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblprice');
    }
}
