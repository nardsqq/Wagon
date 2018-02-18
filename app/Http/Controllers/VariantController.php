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
        //
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
                        Specs::create([
                            'int_spec_var_id_fk' => $variant->int_var_id,
                            'int_spec_pa_id_fk' => $key,
                            'str_spec_constant' => $value
                        ]);
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
        return response()->json($variant);
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

            $variant = Variant::findOrFail($id);

            return response()->json($variant);
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
