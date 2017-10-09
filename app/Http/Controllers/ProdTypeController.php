<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;

class ProdTypeController extends Controller
{
    public function table()
    {
        $prodtypes = ProductType::orderBy('strProdTypeName')->get();
        return view('maintenance.product-type.index')->with('prodtypes', $prodtypes);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodtypes = ProductType::orderBy('strProdTypeName')->get();
        return view('maintenance.product-type.index')->with('prodtypes', $prodtypes);
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
            $this->validate($request, ProductType::$rules);
            $prodtype = new ProductType;
            $prodtype->strProdCateg = $request->strProdCateg;
            $prodtype->strProdTypeName = trim(ucwords($request->strProdTypeName));
            $prodtype->txtProdTypeDesc = trim(ucfirst($request->txtProdTypeDesc));
            $prodtype->save();
            
            return response()->json($prodtype);
        } else {
            return redirect(route('product-type.index'));
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
        $prodtype = ProductType::findOrFail($id);
        return response()->json($prodtype);
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
            $prodtype = ProductType::findOrFail($id);
            $prodtype ->strProdTypeName = trim($request->strProdTypeName);
            $prodtype ->txtProdTypeDesc = trim($request->txtProdTypeDesc);
            $prodtype->save();
            
            return response()->json($prodtype);
        } else {
            return redirect(route('product-type.index'));
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
            $prodtype = ProductType::destroy($del);

            return response()->json($prodtype);
        } else {
            return redirect(route('product-type.index'));
        }
        
    }
}
