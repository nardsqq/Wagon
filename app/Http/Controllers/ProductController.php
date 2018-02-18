<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Attribute;
use App\ProductAttribute;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('str_product_name')->get();

        return view('maintenance.product.index')->with('products', $products);
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
                $this->validate($request, Product::$rules);

                $product = new Product;
                $product->str_product_name = trim(ucwords($request->str_product_name));
                $product->save();

                if($request->has('str_attrib_name')){
                    foreach($request->str_attrib_name as $attrib) {
                        if(Attribute::where('int_attrib_id', $attrib)->first() == null){
                            $attrib = Attribute::firstOrCreate(['str_attrib_name' => $attrib])->int_attrib_id;
                        }

                        ProductAttribute::firstOrCreate([
                            'int_pa_attrib_id_fk' => $attrib,
                            'int_pa_prod_id_fk' => $product->int_product_id
                        ]);
                    }
                }
                

                \DB::commit();
                return response()->json($product);
            }
            catch(Exception $e){
                \DB::rollback();
                return $e;
            }
        } else {
            return redirect(route('product.index'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $data = [
            'str_product_name' => $product->str_product_name,
            'items' => $product->prod_attribs->pluck('int_pa_attrib_id_fk')
        ];
        return response()->json($data);
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
        // return response()->json($request->all());
        if($request->ajax()) {
            try {
                \DB::beginTransaction();

                $product = Product::findOrFail($id);
                $product->str_product_name = trim(ucwords($request->str_product_name));
                $product->save();

                $current_attribs = [];

                if($request->has('str_attrib_name')){
                    foreach($request->str_attrib_name as $attrib) {
                        if(Attribute::where('int_attrib_id', $attrib)->first() == null){
                            $attrib = Attribute::firstOrCreate([
                                'str_attrib_name' => $attrib
                            ])->int_attrib_id;
                        }
                        $current_attribs[] = $attrib;
                        ProductAttribute::firstOrCreate([
                            'int_pa_attrib_id_fk' => $attrib,
                            'int_pa_prod_id_fk' => $product->int_product_id
                        ]);
                    }
                }

                ProductAttribute::destroy($product->prod_attribs->whereNotIn('int_pa_attrib_id_fk', $current_attribs)->pluck('int_prod_attrib_id')->toArray());

                \DB::commit();
                return response()->json($product);
            }
            catch(Exception $e){
                \DB::rollback();
                return $e;
            }
        } else {
            return redirect(route('product.index'));
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
            $product = Product::destroy($del);

            return response()->json($product);
        } else {
            return redirect(route('product.index'));
        }
    }
}
