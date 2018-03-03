<?php

use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Discount::firstOrCreate(['str_discount_name'=>'No Discount', 'int_discount_percentage'=>0.00]);
        App\Discount::firstOrCreate(['str_discount_name'=>'5% Discount', 'int_discount_percentage'=>5.00]);
        App\Discount::firstOrCreate(['str_discount_name'=>'10% Discount', 'int_discount_percentage'=>10.00]);
        App\Discount::firstOrCreate(['str_discount_name'=>'15% Discount', 'int_discount_percentage'=>15.00]);
    }
}