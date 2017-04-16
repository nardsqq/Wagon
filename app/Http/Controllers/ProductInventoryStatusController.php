<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductInventoryStatus;
use Response;
use DB;

class ProductInventoryStatusController extends Controller
{
    public function checkbox($id)
    {
        $prodinventstat = ProductInventoryStatus::find($id);
        if($prodinventstat->isActive) {
            $prodinventstat->isActive=0;
        }
        else {
            $prodinventstat->isActive=1;
        }
        $prodinventstat->save();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodinventstat = DB::table('tblProdInventoryStatus')
        ->select('tblProdInventoryStatus.*')
        ->where('isDeleted','=',0)
        ->get();
        return view('maintenance.productinventorystatus.index')->with('prodinventstat', $prodinventstat);
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
        $this->validate($request, ProductInventoryStatus::$new_rules);
        $prodinventstat = new ProductInventoryStatus;
        $prodinventstat->strProdInventoryStatusName = $request->strProdInventoryStatusName;
        $prodinventstat->strDesc=$request->strDesc;
        $prodinventstat->save();
        return Response::json($prodinventstat);
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
        $prodinventstat = ProductInventoryStatus::find($id);
        return Response::json($prodinventstat);
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
        $rules = ProductInventoryStatus::$update_rules;
        $rules['strProdInventoryStatusName'] = str_replace('ignore:id', 'ignore:'.$id, $rules['strProdInventoryStatusName']);
        $this->validate($request, $rules);
        $prodinventstat = ProductInventoryStatus::find($id);
        $prodinventstat->strProdInventoryStatusName = $request->strProdInventoryStatusName;
        $prodinventstat->strDesc=$request->strDesc;
        $prodinventstat->save();
        return Response::json($prodinventstat);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prodinventstat = ProductInventoryStatus::find($id);
        $prodinventstat->isDeleted = 1;
        $prodinventstat->isActive = 0;
        $prodinventstat->save();
        return Response::json($prodinventstat);
    }
}
