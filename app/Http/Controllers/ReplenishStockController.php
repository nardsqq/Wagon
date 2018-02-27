<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ReplenishStock;
use App\ReplenishStockDetail;
use App\Variant;
use App\Stock;
use App\Supplier;

class ReplenishStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $replenishments = ReplenishStockDetail::all();
        return view('transactions.replenish-stock.index', compact('replenishments'));
    }

    public function formData()
    {
        $products = Product::with('variants.specs.prod_attrib.attribute', 'variants.product')->get();
        $suppliers = Supplier::all();

        return json_encode(compact('products', 'suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transactions.replenish-stock.create');
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
                $replenish_stock                     = new ReplenishStock();
                $replenish_stock->int_supplier_id_fk = $request->supplier;
                $replenish_stock->str_pur_order_num  = $request->purchase_order;
                $replenish_stock->dat_date_received  = date('c');
                $replenish_stock->save();

                $variant = Variant::findOrFail($variant_id);

                $stock_detail                       = new ReplenishStockDetail();
                $stock_detail->int_replenish_id_fk  = $replenish_stock->int_replenish_id;
                $stock_detail->int_repl_var_id_fk   = $variant_id;
                $stock_detail->int_quantity         = $request->quantity[$variant_id];
                $stock_detail->dbl_unit_price       = $request->price[$variant_id];
                $stock_detail->save();

                $stock                            = new Stock();
                $stock->int_stock_var_id_fk       = $variant_id;
                $stock->int_quantity              = $variant->getCurrPrevStock()['current'] + $request->quantity[$variant_id];
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
            'url'       => route('replenish-stock.index')
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
