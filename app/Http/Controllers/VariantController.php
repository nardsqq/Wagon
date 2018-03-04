<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Variant;
use App\Product;
use App\Specs;
use App\Price;
use App\Stock;

class VariantController extends Controller
{
    public function table()
    {
        $products = Product::with('prod_attribs.attribute')->get();
        $variants = Variant::all();
        return view('maintenance.product-variant.table', compact('products', 'variants'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('prod_attribs.attribute')->get();
        $variants = Variant::all();
        return view('maintenance.product-variant.index', compact('products', 'variants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::with('prod_attribs.attribute')->get();
        return response()->json(compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()) {
            try {
                \DB::beginTransaction();
                $this->validate($request, Variant::$rules);

                $variant = new Variant();
                $variant->int_prod_id_fk = $request->product_id;
                $variant->str_var_name = $request->str_var_name;
                $variant->save();

                Price::create([
                    'int_ip_var_id_fk' => $variant->int_var_id,
                    'dbl_price' => $request->price
                ]);

                Stock::create([
                    'int_stock_var_id_fk' => $variant->int_var_id,
                    'int_quantity' => $request->quantity
                ]);

                if($request->has('str_spec_constant')){
                    foreach($request->str_spec_constant as $key => $value){
                        if($value !== null){
                            Specs::create([
                                'int_spec_var_id_fk' => $variant->int_var_id,
                                'int_spec_pa_id_fk' => $key,
                                'str_spec_constant' => $value
                            ]);
                        }
                    }
                }

                \DB::commit();
                return response()->json($variant);
            }
            catch(Exception $e){
                \DB::rollback();
                return $e;
            }
        } else {
            return redirect(route('product-variant.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $variant = Variant::findOrFail($id);
        return view('maintenance.product-variant.show')->with('variant', $variant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $variant = Variant::findOrFail($id);
        $variant->stock = $variant->stocks()->latest()->first()->int_quantity;
        $variant->price = $variant->prices()->latest()->first()->dbl_price;

        $product = Product::with('prod_attribs.attribute')->findOrFail($variant->int_prod_id_fk);

        // [specs.prod_attrib.attribute.str_attrib_name] - specs.str_spec_constant
        // [product.prod_attribs.attribute.str_attrib_name] - []

        $current_attribs = $variant->specs->pluck('int_spec_pa_id_fk')->toArray();
        $new_attribs = $product->prod_attribs()->whereNotIn('int_prod_attrib_id', $current_attribs)->get();

        $specs = [];
        foreach($variant->specs as $attrib){
            $spec = [];
            $spec['str_attrib_name'] = $attrib->prod_attrib->attribute->str_attrib_name;
            $spec['int_prod_attrib_id'] = $attrib->int_spec_pa_id_fk;
            $spec['str_spec_constant'] = $attrib->str_spec_constant;
            array_push($specs, $spec);
        }
        foreach($new_attribs as $attrib){
            $spec = [];
            $spec['str_attrib_name'] = $attrib->attribute->str_attrib_name;
            $spec['int_prod_attrib_id'] = $attrib->int_prod_attrib_id;
            $spec['str_spec_constant'] = null;
            array_push($specs, $spec);
        }


        return response()->json([
            'variant' =>  $variant,
            'product' => $product,
            'specs' => $specs
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->ajax()) {
            try {
                \DB::beginTransaction();

                $variant = Variant::findOrFail($id);
                $variant->str_var_name = $request->str_var_name;
                $variant->save();

                Price::firstOrCreate([
                    'int_ip_var_id_fk' => $variant->int_var_id,
                    'dbl_price' => $request->price
                ]);

                // Stock::firstOrCreate([
                //     'int_stock_var_id_fk' => $variant->int_var_id,
                //     'int_quantity' => $request->quantity
                // ]);

                if($request->has('str_spec_constant')){
                    foreach($request->str_spec_constant as $key => $value){
                        $specs = Specs::where('int_spec_var_id_fk', $variant->int_var_id)
                            ->where('int_spec_pa_id_fk', $key)
                            ->first();
                        if($value !== null){
                            Specs::updateOrCreate(
                                [
                                    'int_spec_var_id_fk' => $variant->int_var_id,
                                    'int_spec_pa_id_fk' => $key
                                ],
                                ['str_spec_constant' => $value]
                            );
                        } else {
                            if($specs !== null){
                                $specs->delete();
                            }
                        }
                    }
                }

                \DB::commit();
                return response()->json($variant);
            }
            catch(Exception $e){
                \DB::rollback();
                return $e;
            }
        } else {
            return redirect(route('product-variant.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $del = [];
            $request->has('values') ? $del = $request->values : array_push($del, $id);
            $variant = Variant::destroy($del);

            return response()->json($variant);
        } else {
            return redirect(route('product-variant.index'));
        }
    }
}
