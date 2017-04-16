<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductInventory;
use App\ProductInventoryStatus;
use App\Product;
use App\ProductCategory;
use Response;
use DB;

class ProductInventoryController extends Controller
{
    public function checkbox($id)
    {
        $productinventory = ProductInventory::find($id);
        if ($productinventory->isActive) {
            $productinventory->isActive=0;
        }
        else{
            $productinventory->isActive=1;
        }
        $productinventory->save();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodinvent = DB::table('tblProductInventory')
            ->join('tblProduct', 'tblProduct.intProductID', 'tblProductInventory.intProductInventoryProdID')
            ->join('tblProdInventoryStatus', 'tblProdInventoryStatus.intProdInventoryStatusID', 'tblProductInventory.intProdInventStatID')
            ->select('tblProductInventory.*', 'tblProduct.strProductName', 'tblProdInventoryStatus.strProdInventoryStatusName')
            ->where('tblProductInventory.isDeleted','=',0)
            ->get();
        $prod = DB::table('tblProduct')
            ->select('tblProduct.*')
            ->where('tblProduct.isActive','=',1)
            ->get();
        $prodstat = DB::table('tblProdInventoryStatus')
            ->select('tblProdInventoryStatus.*')
            ->where('tblProdInventoryStatus.isActive','=',1)
            ->get();
        return view('maintenance.productinventory.index')->with('prodinvent', $prodinvent)->with('prod', $prod)->with('prodstat', $prodstat);
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
        $prodinvent->intProductQuantity = $request->intProductQuantity;
        $prodinvent->intProdInventStatID = $request->intProdInventStatID;
        $prodinvent->save();
        $prodinvent = DB::table('tblProductInventory')
            ->join('tblProduct', 'tblProductInventory.intProductInventoryProdID', '=', 'tblProduct.intProductID')
            ->join('tblProdInventoryStatus', 'tblProductInventory.intProdInventStatID', '=', 'tblProdInventoryStatus.intProdInventoryStatusID')
            ->select('tblProductInventory.*', 'tblProduct.strProductName', 'tblProdInventoryStatus.strProdInventoryStatusName')
            ->get();
        foreach ($prodinvent as $b) {
                # code...
            $prodinvent=$b;
        }
        return Response::json($prodinvent);
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
        $prodinvent = ProductInventory::find($id);
        return Response::json($prodinvent);
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
        $prodinvent = ProductInventory::find($id);
        $prodinvent->intProductQuantity = $request->intProductQuantity;
        $prodinvent->intProdInventStatID = $request->intProdInventStatID;
        $prodinvent->save();
        $prodinvent = DB::table('tblProductInventory')
            ->join('tblProduct', 'tblProductInventory.intProductInventoryProdID', '=', 'tblProduct.intProductID')
            ->join('tblProdInventoryStatus', 'tblProductInventory.intProdInventStatID', '=', 'tblProdInventoryStatus.intProdInventoryStatusID')
            ->select('tblProductInventory.*', 'tblProduct.strProductName', 'tblProdInventoryStatus.strProdInventoryStatusName')
            ->get();
        foreach ($prodinvent as $b) {
                # code...
            $prodinvent=$b;
        }
        return Response::json($prodinvent);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prodinvent = ProductInventory::find($id);
        $prodinvent->isDeleted=1;
        $prodinvent->isActive=0;
        $prodinvent->save();
        return Response::json($prodinvent);
    }
}
