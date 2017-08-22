<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warehouse;
use Validator;

class WarehouseController extends Controller
{
    /*Enforce Validation Rules*/
    protected $rules =
    [
        'strWarehouseName' => 'required|min:2|unique:tblwarehouse|max:45|regex:/^[a-z ,.\'-]+$/i',
        'txtWarehouseLocation' => 'required|min:2|max:500|regex:/^[a-z ,.\'-]+$/i',
        'txtWarehouseDesc' => 'min:2|max:500|regex:/^[a-z ,.\'-]+$/i'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = Warehouse::where('isDeleted', 0)->get();
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
            $warehouse = new Warehouse();
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
        $warehouse = Warehouse::findOrFail($id);
        $warehouse->strWarehouseName = trim($request->strWarehouseName);
        $warehouse->txtWarehouseLocation = trim($request->txtWarehouseLocation);
        $warehouse->txtWarehouseDesc = trim($request->txtWarehouseDesc);
        $warehouse->save();
        return response()->json($warehouse);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warehouse = Warehouse::findOrFail($id);
        $warehouse->isDeleted = 1;
        $warehouse->intWarehouseStatus = 0;
        $warehouse->save();
        return response()->json($warehouse);
    }
}
