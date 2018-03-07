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
        App\ModeOfPayment::firstOrCreate(['str_mode_pay_name'=>'Cash']);
        App\ModeOfPayment::firstOrCreate(['str_mode_pay_name'=>'Cheque']);
    }
}