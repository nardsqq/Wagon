<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warehouse;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = Warehouse::orderBy('strWarehouseName')->get();
        return view('maintenance.warehouse.index')->with('warehouses', $warehouses);
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
        if ($request->ajax()) {
            $this->validate($request, Warehouse::$rules);
            $warehouse = new Warehouse;
            $warehouse->strWarehouseName = trim(ucwords($request->strWarehouseName));
            $warehouse->txtWarehouseLocation = trim(ucfirst($request->txtWarehouseLocation));
            $warehouse->txtWarehouseDesc = trim(ucfirst($request->txtWarehouseDesc));
            $warehouse->save();
            return response()->json($warehouse);
        } else {
            return redirect(route('warehouse.index'));
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
        $warehouse = Warehouse::findOrFail($id);
        return response()->json($warehouse);
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
        if ($request->ajax()) {
            $warehouse = Warehouse::findOrFail($id);
            $warehouse->strWarehouseName = trim($request->strWarehouseName);
            $warehouse->txtWarehouseLocation = trim($request->txtWarehouseLocation);
            $warehouse->txtWarehouseDesc = trim($request->txtWarehouseDesc);
            $warehouse->save();
            return response()->json($warehouse);
        } else {
            return redirect(route('warehouse.index'));
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
            $warehouse = Warehouse::destroy($del);

            return response()->json($warehouse);
        } else {
            return redirect(route('warehouse.index'));
        } 
    }
}
