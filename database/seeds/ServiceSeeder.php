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
        $services = [
            'Supply and Install of Generating Sets' => [
                'descriptions' => [],
                'materials' => []
            ],
            'Crankshaft Replacement' => [
                'descriptions' => [],
                'materials' => []
            ],
            'Fuel Pumps Servicing' => [
                'descriptions' => [],
                'materials' => []
            ],
            'Electrical Works' => [
                'descriptions' => [],
                'materials' => []
            ],
            'Repair: Hydraulic Pumps and Motors' => [
                'descriptions' => [],
                'materials' => []
            ],
            'Repair: Air Compressor' => [
                'descriptions' => [],
                'materials' => []
            ],
            'Repair: Pumps' => [
                'descriptions' => [],
                'materials' => ['Power Pump']
            ],
            'Repair: Heat Exchangers' => [
                'descriptions' => [],
                'materials' => []
            ],
            'Repair: Air Conditioning Units' => [
                'descriptions' => [],
                'materials' => []
            ],
        ];

        foreach($services as $service_name => $value){
            $service = Service::firstOrCreate([
                'str_service_name' => $service_name,
                'dbl_service_price' => 1000.00
            ]);
            foreach($value['descriptions'] as $desc){
                $service->descriptions()->firstOrCreate([
                    'str_service_desc_detail' => $desc
                ]);
            }
            foreach($value['materials'] as $item){
                $service->materials()->firstOrCreate([
                    'int_mat_prod_id_fk' => Product::firstOrCreate(['str_product_name'=>$item])->int_product_id
                ]);
            }
        }
    }
}
