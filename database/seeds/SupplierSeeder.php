<?php

use Illuminate\Database\Seeder;
use App\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::firstOrCreate([
            'str_supplier_name' => 'Supplier 1',
            'txt_supplier_address' => 'Sample Address', 
            'str_supplier_mobile_num' => '999-999-9999',
            'str_supplier_tel_num' => '(999)-9999',
            'str_supplier_email' => 'email@supplier1.com'
        ]);

        Supplier::firstOrCreate([
            'str_supplier_name' => 'Supplier 2',
            'txt_supplier_address' => 'Sample Address', 
            'str_supplier_mobile_num' => '999-999-9990',
            'str_supplier_tel_num' => '(999)-9990',
            'str_supplier_email' => 'email@supplier2.com'
        ]);
    }
}
