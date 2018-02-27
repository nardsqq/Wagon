<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\AdjustStock;
use App\Variant;
use App\Stock;

class AdjustStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adjustments = AdjustStock::all();
        return view('transactions.adjust-stock.index', compact('adjustments'));
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

            foreach($request->variants as $variant_id)
            {
                $adjust_stock                     = new AdjustStock();
                $adjust_stock->int_sa_var_id_fk   = $variant_id;
                $adjust_stock->int_quantity       = $request->quantity[$variant_id];
                $adjust_stock->str_action         = $request->action[$variant_id];
                $adjust_stock->txt_reason         = $request->reason[$variant_id];
                $adjust_stock->save();

                $variant = Variant::findOrFail($variant_id);

                $stock                            = new Stock();
                $stock->int_stock_var_id_fk       = $variant_id;
                $stock->int_quantity              = $request->action[$variant_id] == AdjustStock::$actions['WIT'] ? 
                                                    $variant->getCurrPrevStock()['current'] - $request->quantity[$variant_id] : 
                                                    $variant->getCurrPrevStock()['current'] + $request->quantity[$variant_id];
                $stock->save();
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
