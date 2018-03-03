<?php

use Illuminate\Database\Seeder;

class PaymentTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\PaymentTerm::firstOrCreate(['str_terms_pay_name'=>'Upon Receipt', 'int_terms_pay_percentage'=>100.00, 'int_terms_pay_days'=>0]);
        App\PaymentTerm::firstOrCreate(['str_terms_pay_name'=>'EOM (End of the Month)', 'int_terms_pay_percentage'=>100.00, 'int_terms_pay_days'=>30]);
        App\PaymentTerm::firstOrCreate(['str_terms_pay_name'=>'Net 15', 'int_terms_pay_percentage'=>100.00, 'int_terms_pay_days'=>15]);
        App\PaymentTerm::firstOrCreate(['str_terms_pay_name'=>'Net 30', 'int_terms_pay_percentage'=>100.00, 'int_terms_pay_days'=>30]);
        App\PaymentTerm::firstOrCreate(['str_terms_pay_name'=>'Net 60', 'int_terms_pay_percentage'=>100.00, 'int_terms_pay_days'=>60]);
    }
}