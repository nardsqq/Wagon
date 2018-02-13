<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliverySignatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_delivery_signature', function (Blueprint $table) {
            $table->increments('int_delivery_signature_id');
            $table->integer('int_delsig_delivery_id_fk')->unsigned();
            $table->string('str_signature_type', 45);
            $table->string('str_signed_by', 45);
            
            $table->timestamps();
            $table->softdeletes();

            $table->foreign('int_delsig_delivery_id_fk')
                  ->references('int_delivery_id')
                  ->on('tbl_delivery');

            // Kailangan ko pa i-confirm kay Tyron if user input yung "date signed"
            // Timestamps muna for the meantime (created_at)
            // $table->date('dat_date_signed');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_delivery_signature', function (Blueprint $table) {
            $table->dropForeign(['int_delsig_delivery_id_fk']);
        });
        
        Schema::dropIfExists('tbl_delivery_signature');
    }
}
