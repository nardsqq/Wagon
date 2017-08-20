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
            ->where('tblProduct.intProdStatus', '=', 1)
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
        $product = new Product;
        $product->intProdProdCateID = $request->intProdProdCateID;
        $product->strProdName = trim(ucwords($request->strProdName));
        $product->strProdHandle = trim(ucfirst($request->strProdHandle));
        $product->strProdSKU = trim(strtoupper($request->strProdSKU));
        $product->txtProdDesc = trim(ucfirst($request->txtProdDesc));
        $product->save();

        $product = DB::table('tblProduct')
            ->join('tblProductCategory', 'tblProduct.intProdProdCateID', '=', 'tblProductCategory.intProdCategID')
            ->select('tblProduct.*', 'tblProductCategory.strProdCategName')
            ->where('tblProduct.intProdStatus', '=', 1)
            ->get();

        foreach ($product as $prod) {
            $product = $prod;
        }

        return Response::json($product);
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
        //
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
