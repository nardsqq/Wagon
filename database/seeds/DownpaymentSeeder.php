<?php

use Illuminate\Database\Seeder;

class DownpaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Downpayment::firstOrCreate(['str_down_name'=>'No Downpayment', 'int_down_percentage'=>0.00]);
        App\Downpayment::firstOrCreate(['str_down_name'=>'30% Downpayment', 'int_down_percentage'=>30.00]);
        App\Downpayment::firstOrCreate(['str_down_name'=>'50% Downpayment', 'int_down_percentage'=>50.00]);
    }
}