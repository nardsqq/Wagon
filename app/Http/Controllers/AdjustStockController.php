<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\AdjustStock;

class AdjustStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transactions.adjust-stock.index');
    }

    public function formData()
    {
        $products = Product::with('variants.specs.prod_attrib.attribute', 'variants.product')->get();
        $actions = AdjustStock::$actions;

        return json_encode(compact('products', 'actions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transactions.adjust-stock.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // [todo] insert validation rules here

            \DB::beginTransaction();

            foreach($request->variants as $variant)
            {
                $adjust_stock                     = new AdjustStock();
                $adjust_stock->int_sa_var_id_fk   = $variant;
                $adjust_stock->int_quantity       = $request->quantity[$variant];
                $adjust_stock->str_action         = $request->action[$variant];
                $adjust_stock->txt_reason         = $request->reason[$variant];
                $adjust_stock->save();
            }

            \DB::commit();
        }
        catch(Exception $e){
            \DB::rollback();

            return response()->json([
                'message'   => $e,
                'alert'     => 'error',
            ]);
        }

        return response()->json([
            'message'   => 'Successfully completed transaction',
            'alert'     => 'success',
            'url'       => route('adjust-stock.index')
        ]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
