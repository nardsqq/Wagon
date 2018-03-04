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
        $product = Product::firstOrCreate([
            'str_product_name' => 'Product 1'
        ]);

        $variant = Variant::firstOrCreate([
            'int_prod_id_fk' => $product->int_product_id,
            'str_var_name' => 'Variant 1'
        ]);

        $variant->prices()->firstOrCreate([
            'dbl_price' => 1000.00
        ]);

        $variant->stocks()->firstOrCreate([
            'int_quantity' => 100
        ]);

        $variant->specs()->firstOrCreate([
            'int_spec_pa_id_fk' => $product->prod_attribs()->firstOrCreate([
                'int_pa_attrib_id_fk' => Attribute::firstOrCreate(['str_attrib_name' => 'attribute-2'])->int_attrib_id
            ])->int_prod_attrib_id,
            'str_spec_constant' => 'value-2'
        ]);

        $variant->specs()->firstOrCreate([
            'int_spec_pa_id_fk' => $product->prod_attribs()->firstOrCreate([
                'int_pa_attrib_id_fk' => Attribute::firstOrCreate(['str_attrib_name' => 'attribute-1'])->int_attrib_id
            ])->int_prod_attrib_id,
            'str_spec_constant' => 'value-1'
        ]);
    
                
    }
}
