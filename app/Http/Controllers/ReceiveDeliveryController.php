<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReceiveHeader;
use App\ReceiveDetail;
use App\Variant;
use App\Supplier;
use DB;

class ReceiveDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        $variants = Variant::all();
        $headers = ReceiveHeader::all();
        return view('transactions.receive-items.index', compact('headers','suppliers', 'variants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function table()
     {
         $headers = ReceiveHeader::all();
         return view('transactions.receive-items.table', compact('headers'));
     }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headers = ReceiveHeader::all();
        return view('transactions.receive-items.table', compact('headers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $header = new ReceiveHeader;

        $header->intRecDelPONum = trim($request->strPONumber);
        $header->intRecDelDtmRec = $request->intRecDelDtmRec;
        $header->intRD_Supp_ID = $request->intS_Supp_ID;
        $header->save();

        if($request->has('items')){
            for($i=0; $i<count($request->items); $i++){
                ReceiveDetail::create([
                    'intRDD_Head_ID' => $header->intRecDelID,
                    'intRDD_Var_ID' => $request->items[$i],
                    'intRecDelDetQty' => $request->total[$i],
                    'decInventoryCost' => $request->qty[$i],
                    'decTotalCost' => $request->inventory_cost[$i],
                ]);
            }
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
        $header = ReceiveHeader::findOrFail($id);
        return view('transactions.receive-items.show', compact('header'));
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
