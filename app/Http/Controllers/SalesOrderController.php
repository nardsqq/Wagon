<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotation;
use App\SalesOrder;
use App\SalesOrderDetail;

class SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headers = SalesOrder::all();
        return view('transactions.sales-order.index', compact('headers'));
    }

    public function table()
    {
        $headers = SalesOrder::all();
        return view('transactions.sales-order.table', compact('headers'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->has('quotation')){
            $quote = Quotation::with('products.variant')->findOrFail($request->quotation);
            return view('transactions.sales-order.modal', compact('quote'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $sales = new SalesOrder;

        $sales->intSO_QuotH_ID = trim($request->intSO_QuotH_ID);
        $sales->strSalesOrderCPONumber = trim($request->strSalesOrderCPONumber);
        $sales->datSODateReceived = \Carbon\Carbon::now()->format('Y-m-d');;
        $sales->save();

        if($request->has('products')){
            for($i=0; $i<count($request->products); $i++){
                SalesOrderDetail::create([
                    'intSODP_SO_ID' => $sales->intSalesOrderID,
                    'intSODP_Var_ID' => $request->products[$i],
                    'decSODPUnitPrice' => $request->price[$i],
                    'intQuotDPQuantity' => $request->qty[$i],
                ]);
            }
        }

        return response()->redirect('sales-order.index');
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
