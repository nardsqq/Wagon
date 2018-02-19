<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    public function table()
    {
        $suppliers = Supplier::orderBy('str_supplier_name')->get();
        return view('maintenance.supplier.table')->with('suppliers', $suppliers);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::orderBy('str_supplier_name')->get();
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

            $supplier->str_supplier_name = trim(ucwords($request->str_supplier_name));
            $supplier->str_supplier_mobile_num = trim($request->str_supplier_mobile_num);
            $supplier->txt_supplier_address = trim(ucwords($request->txt_supplier_address));

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

            $supplier->str_supplier_name = trim(ucwords($request->str_supplier_name));
            $supplier->str_supplier_mobile_num = trim($request->str_supplier_mobile_num);
            $supplier->txt_supplier_address = trim(ucwords($request->txt_supplier_address));

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
