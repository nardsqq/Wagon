<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ProductCategory;
use App\Product;
use Validator;
use Response;
use View;
use DB;


class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('tblProduct')
            ->join('tblProductCategory', 'tblProduct.intProdProdCateID', '=', 'tblProductCategory.intProdCategID')
            ->select('tblProduct.*', 'tblProductCategory.strProdCategName')
            ->where('tblProduct.isDeleted', '=', 0)
            ->orderBy('tblProduct.intProdID')
            ->get();

        $prodcategs = DB::table('tblProductCategory')
            ->select('tblProductCategory.*')
            ->where('tblProductCategory.intProdCategStatus', '=', 1)
            ->get();

        return view('maintenance.product.index')->with('products', $products)->with('prodcategs', $prodcategs);
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
        $this->validate($request, Product::$rules);
        $prodcateg = ProductCategory::find($request->intProdProdCateID);
        $product = new Product;
        $product->prodcateg()->associate($prodcateg);
        $product->intProdProdCateID = $request->intProdProdCateID;
        $product->strProdName = trim(ucwords($request->strProdName));
        $product->strProdHandle = trim(ucwords($request->strProdHandle));
        $product->strProdSKU = trim(strtoupper($request->strProdSKU));
        $product->txtProdDesc = trim(ucfirst($request->txtProdDesc));
        $product->save();

        $product = DB::table('tblProduct')
        ->join('tblProductCategory', 'tblProduct.intProdProdCateID', '=', 'tblProductCategory.intProdCategID')
        ->select('tblProduct.*', 'tblProductCategory.strProdCategName')
        ->get();

        foreach ($product as $b) {
            $product=$b;
        }
        return Response::json($product);

        // return response()->json($product);
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
        $product = Product::findOrFail($id);
        $product->intProdProdCateID = $request->intProdProdCateID;
        $product->strProdName = trim(ucwords($request->strProdName));
        $product->strProdHandle = trim(ucfirst($request->strProdHandle));
        $product->strProdSKU = trim(strtoupper($request->strProdSKU));
        $product->txtProdDesc = trim(ucfirst($request->txtProdDesc));
        $product->save();

        $product = DB::table('tblProduct')
        ->join('tblProductCategory', 'tblProduct.intProdProdCateID', '=', 'tblProductCategory.intProdCategID')
        ->select('tblProduct.*', 'tblProductCategory.strProdCategName')
        ->get();

        foreach ($product as $b) {
            $product=$b;
        }
        return Response::json($product);
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
        $product->intWarehouseStatus = 0;
        $product->save();
        return response()->json($product);
    }
}
