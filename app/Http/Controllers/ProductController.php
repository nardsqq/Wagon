<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use App\Product;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodcategs = ProductCategory::where('isDeleted', 0)->get();
        $products = Product::where('isDeleted', 0)->get();
        return view('maintenance.product.index')->with('products', $products)->with('prodcategs', $prodcategs);
        // return view('maintenance.product.index', compact('products', 'prodcategs'));
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
            $this->validate($request, Product::$rules);
            $prodcateg = ProductCategory::find($request->intProdProdCateID);
            $product = new Product();
            $product->prodcateg()->associate($prodcateg);
            $product->strProdName = trim(ucwords($request->strProdName));
            $product->strProdHandle = trim(ucwords($request->strProdHandle));
            $product->strProdSKU = trim(strtoupper($request->strProdSKU));
            $product->txtProdDesc = trim(ucfirst($request->txtProdDesc));
            $product->save();
            return response()->json($product);
        } else {
            return redirect(route('product.index'));
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
        $product = Product::findOrFail($id);
        return response()->json($product);
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
            $prodcateg = ProductCategory::find($request->intProdProdCateID);
            $product = Product::findOrFail($id);
            $product->prodcateg()->associate($prodcateg);
            $product->strProdName = trim($request->strProdName);
            $product->strProdHandle = trim($request->strProdHandle);
            $product->strProdSKU = trim($request->strProdSKU);
            $product->txtProdDesc = trim($request->txtProdDesc);
            $product->save();
            return response()->json($product);
        } else {
            return redirect(route('product.index'));
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
        $product = Product::findOrFail($id);
        $product->isDeleted = 1;
        $product->intProdStatus = 0;
        $product->save();
        return response()->json($product);
    }
}
