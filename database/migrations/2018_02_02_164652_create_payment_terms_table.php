<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_terms_payment', function (Blueprint $table) {
            $table->increments('int_terms_pay_id');
            $table->string('str_terms_pay_name', 45);
            $table->double('dbl_terms_pay_percentage', 5,2);
            $table->integer('int_terms_pay_days');
            
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
        Schema::dropIfExists('tbl_terms_payment');
    }
}
