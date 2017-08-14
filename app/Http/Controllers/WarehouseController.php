<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warehouse;
use Response;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = Warehouse::all();
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
        $warehouse = new Warehouse;
        $warehouse -> strWarehouseName = trim(ucfirst($request->strWarehouseName));
        $warehouse -> txtWarehouseLocation = trim(ucfirst($request->txtWarehouseLocation));
        $warehouse -> txtWarehouseDesc = trim(ucfirst($request->txtWarehouseDesc));
        $warehouse->save();
        return Response::json($warehouse);
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
        $warehouse = Warehouse::find($id);
        $warehouse -> strWarehouseName = trim(ucfirst($request->strWarehouseName));
        $warehouse -> txtWarehouseLocation = trim(ucfirst($request->txtWarehouseLocation));
        $warehouse -> txtWarehouseDesc = trim(ucfirst($request->txtWarehouseDesc));
        $warehouse->save();
        return Response::json($warehouse);
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
