<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    public function table()
    {
        $suppliers = Supplier::orderBy('strSuppName')->get();
        return view('maintenance.supplier.table')->with('suppliers', $suppliers);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::orderBy('strSuppName')->get();
        return view('maintenance.supplier.index')->with('suppliers', $suppliers);
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
            $this->validate($request, Supplier::$rules);

            $supplier = new Supplier;

            $supplier->strSuppName = trim(ucwords($request->strSuppName));
            $supplier->strSuppContactNum = trim($request->strSuppContactNum);
            $supplier->strSuppAddLotNo = trim($request->strSuppAddLotNo);
            $supplier->strSuppAddStBldg = trim(ucwords($request->strSuppAddStBldg));
            $supplier->strSuppAddStBldg = trim(ucwords($request->strSuppAddStBldg));
            $supplier->strSuppAddBrgy = trim(ucwords($request->strSuppAddBrgy));
            $supplier->strSuppAddCity = trim(ucwords($request->strSuppAddCity));
            $supplier->strSuppContactPers = trim(ucwords($request->strSuppContactPers));
            $supplier->strSuppContactPersNum = trim($request->strSuppContactPersNum);

            $supplier->save();
            return response()->json($supplier);
        } else {
            return redirect(route('supplier.index'));
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
        $supplier = Supplier::findOrFail($id);
        return view('maintenance.supplier.show')->with('supplier', $supplier);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return response()->json($supplier);
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

            $supplier = Supplier::findOrFail($id);

            $supplier->strSuppName = trim(ucwords($request->strSuppName));
            $supplier->strSuppContactNum = trim($request->strSuppContactNum);
            $supplier->strSuppAddLotNo = trim($request->strSuppAddLotNo);
            $supplier->strSuppAddStBldg = trim(ucwords($request->strSuppAddStBldg));
            $supplier->strSuppAddStBldg = trim(ucwords($request->strSuppAddStBldg));
            $supplier->strSuppAddBrgy = trim(ucwords($request->strSuppAddBrgy));
            $supplier->strSuppAddCity = trim(ucwords($request->strSuppAddCity));
            $supplier->strSuppContactPers = trim(ucwords($request->strSuppContactPers));
            $supplier->strSuppContactPersNum = trim($request->strSuppContactPersNum);

            $supplier->save();
            return response()->json($supplier);
        } else {
            return redirect(route('supplier.index'));
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
            $supplier = Supplier::destroy($del);

            return response()->json($supplier);
        } else {
            return redirect(route('supplier.index'));
        }
    }
}
