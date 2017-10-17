<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Supplier;
use App\Variant;

class StockController extends Controller
{
    public function table()
    {
        $variants = Variant::orderBy('strVarModel')->get();
        $suppliers = Supplier::orderBy('strSuppName')->get();
        $stocks = Stock::orderBy('strPONumber')->get();

        return view('transactions.inventory.table')->with('variants', $variants)->with('suppliers', $suppliers)->with('stocks', $stocks);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variants = Variant::orderBy('strVarModel')->get();
        $suppliers = Supplier::orderBy('strSuppName')->get();
        $stocks = Stock::orderBy('strPONumber')->get();

        return view('transactions.inventory.index')->with('variants', $variants)->with('suppliers', $suppliers)->with('stocks', $stocks);
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

            $variant = Variant::find($request->intS_Var_ID);
            $supplier = Supplier::find($request->intS_Supp_ID);
            $stock = new Stock;

            $stock->variants()->associate($variant);
            $stock->suppliers()->associate($supplier);
            $stock->strEntryType = $request->strEntryType;
            $stock->strPONumber = $request->strPONumber;
            $stock->intQuantity = $request->intQuantity;
            $stock->decInventCost = $request->decInventCost;
            $stock->dtmAcquisition = $request->dtmAcquisition;

            $stock->save();
            return response()->json($stock);
        } else {
            return redirect(route('stock.index'));
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
        $stock = Stock::findOrFail($id);
        return response()->json($stock);
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

            $variant = Variant::find($request->intS_Var_ID);
            $supplier = Supplier::find($request->intS_Supp_ID);
            $stock = Stock::findOrFail($id);

            $stock->variants()->associate($variant);
            $stock->suppliers()->associate($supplier);
            $stock->strEntryType = $request->strEntryType;
            $stock->strPONumber = $request->strPONumber;
            $stock->intQuantity = $request->intQuantity;
            $stock->decInventCost = $request->decInventCost;
            $stock->dtmAcquisition = $request->dtmAcquisition;

            $stock->save();
            return response()->json($stock);
        } else {
            return redirect(route('stock.index'));
        }
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
