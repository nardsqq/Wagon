<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;

class ProdCategController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodcategs = ProductCategory::orderBy('strProdCategName')->get();
        return view('maintenance.product-category.index')->with('prodcategs', $prodcategs);
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
            $this->validate($request, ProductCategory::$rules);
            
            $prodcateg = new ProductCategory;
            $prodcateg ->strProdCategName = trim(ucwords($request->strProdCategName));
            $prodcateg ->txtProdCategDesc = trim(ucfirst($request->txtProdCategDesc));
            $prodcateg->save();
            
            return response()->json($prodcateg);
        } else {
            return redirect(route('product-category.index'));
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
        $prodcateg = ProductCategory::findOrFail($id);
        return response()->json($prodcateg);
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
            $prodcateg = ProductCategory::findOrFail($id);
            $prodcateg ->strProdCategName = trim($request->strProdCategName);
            $prodcateg ->txtProdCategDesc = trim($request->txtProdCategDesc);
            $prodcateg->save();
            
            return response()->json($prodcateg);
        } else {
            return redirect(route('product-category.index'));
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
            $prodcateg = ProductCategory::destroy($del);

            return response()->json($prodcateg);
        } else {
            return redirect(route('product-category.index'));
        }
        
    }
}
