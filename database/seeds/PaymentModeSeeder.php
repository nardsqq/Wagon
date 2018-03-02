<?php

use Illuminate\Database\Seeder;

class PaymentModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\ModeOfPayment::firstOrCreate(['str_mode_pay_name'=>'COD (Cash On Delivery)']);
        App\ModeOfPayment::firstOrCreate(['str_mode_pay_name'=>'Cheque']);
    }
}