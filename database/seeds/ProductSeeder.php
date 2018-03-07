<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Attribute;
use App\Variant;
use App\Specs;
use App\Price;
use App\Stock;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            'Genset' => [
                'Perkin' => [
                    'fuel type' => 'Diesel',
                    'frequency' => '60Hz',
                    'engine speed' => '1500 RPM',
                    'voltage' => '400/230v'
                ],
                'Cummins' => [
                    'fuel type' => 'Diesel',
                    'frequency' => '60Hz',
                    'engine speed' => '1500 RPM',
                    'voltage' => '400/230v'
                ],
                'Yanmar' => [
                    'fuel type' => 'Diesel',
                    'frequency' => '60Hz',
                    'engine speed' => '1500 RPM',
                    'voltage' => '400/230v'
                ]
            ],
            'Power Pump' => [
                'PP-12V-17AH' => [
                    'fuel type' => 'Diesel',
                    'battery'=> '12V-17AH'
                ],
                'PP-12V-22AH' => [
                    'fuel type' => 'Diesel',
                    'battery'=> '12V-22AH'
                ],
                'PP-12V-30AH' => [
                    'fuel type' => 'Diesel',
                    'battery'=> '12V-30AH'
                ],
                'PP-12V-36AH' => [
                    'fuel type' => 'Diesel',
                    'battery'=> '12V-36AH'
                ]
            ],
            'Concrete Cutter' => [
                'Diesel' => [
                    'fuel type' => 'Diesel',
                    'driving' => 'Manual Push',
                    'depth adjustment' => 'Handle Rotation'
                ],
                'Petrol' => [
                    'fuel type' => 'Petrol',
                    'driving' => 'Manual Push',
                    'depth adjustment' => 'Handle Rotation'
                ]
            ]

        ];

        foreach($products as $prod_name => $variants){
            $product = Product::firstOrCreate([
                'str_product_name' => $prod_name
            ]);

            foreach($variants as $var_name => $specs){
                $variant = Variant::firstOrCreate([
                    'int_prod_id_fk' => $product->int_product_id,
                    'str_var_name' => $var_name
                ]);
        
                $variant->prices()->firstOrCreate([
                    'dbl_price' => 1000.00
                ]);
        
                $variant->stocks()->firstOrCreate([
                    'int_quantity' => 100
                ]);

                foreach($specs as $attrib_name => $attrib_value){
                    $variant->specs()->firstOrCreate([
                        'int_spec_pa_id_fk' => $product->prod_attribs()->firstOrCreate([
                            'int_pa_attrib_id_fk' => Attribute::firstOrCreate(['str_attrib_name' => $attrib_name])->int_attrib_id
                        ])->int_prod_attrib_id,
                        'str_spec_constant' => $attrib_value
                    ]);
                }
            }
        }                
    }
}
