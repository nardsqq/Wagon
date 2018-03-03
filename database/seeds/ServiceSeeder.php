<?php

use Illuminate\Database\Seeder;
use App\Service;
use App\Product;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = Service::firstOrCreate([
            'str_service_name' => 'Service 1',
            'dbl_service_price' => 1000.00
        ]);

        $service->descriptions()->firstOrCreate([
            'str_service_desc_detail' => 'Description 1'
        ]);
        $service->descriptions()->firstOrCreate([
            'str_service_desc_detail' => 'Description 2'
        ]);
        $service->descriptions()->firstOrCreate([
            'str_service_desc_detail' => 'Description 3'
        ]);
        $service->descriptions()->firstOrCreate([
            'str_service_desc_detail' => 'Description 4'
        ]);

        $service->materials()->firstOrCreate([
             'int_mat_prod_id_fk' => Product::firstOrCreate(['str_product_name'=>'Product 1'])->int_product_id
        ]);

        $service->materials()->firstOrCreate([
            'int_mat_prod_id_fk' => Product::firstOrCreate(['str_product_name'=>'Product 2'])->int_product_id
        ]);


        $service = Service::firstOrCreate([
            'str_service_name' => 'Service 2',
            'dbl_service_price' => 2000.00
        ]);

        $service->descriptions()->firstOrCreate([
            'str_service_desc_detail' => 'Description 1'
        ]);
        $service->descriptions()->firstOrCreate([
            'str_service_desc_detail' => 'Description 2'
        ]);

        $service->materials()->firstOrCreate([
             'int_mat_prod_id_fk' => Product::firstOrCreate(['str_product_name'=>'Product 3'])->int_product_id
        ]);

        $service->materials()->firstOrCreate([
            'int_mat_prod_id_fk' => Product::firstOrCreate(['str_product_name'=>'Product 2'])->int_product_id
        ]);
    }
}
