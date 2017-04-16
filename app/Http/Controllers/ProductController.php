<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductCategory;
use Response;
use DB;

class ProductController extends Controller
{
    public function checkbox($id)
    {
        $product = Product::find($id);
        if ($product->isActive) {
            $product->isActive=0;
        }
        else{
            $product->isActive=1;
        }
        $product->save();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('tblProduct')
            ->join('tblProductCategory', 'tblProduct.intProductCategory', '=', 'tblProductCategory.intProductCategoryID')
            ->select('tblProduct.*', 'tblProductCategory.strProductCategoryName')
            ->where('tblProduct.isDeleted','=',0)
            ->get();
        $productcategory = DB::table('tblProductCategory')
            ->select('tblProductCategory.*')
            ->where('tblProductCategory.isActive','=',1)
            ->get();
            return view('maintenance.product.index')->with('product', $product)->with('productcategory', $productcategory);
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
        $this->validate($request, Product::$new_rules);
        $product = new Product;
        $product->strProductName = $request->strProductName;
        $product->intProductCategory = $request->intProductCategory;
        $product->strProductSerialNumber = $request->strProductSerialNumber;
        $product->save();
        $product = DB::table('tblProduct')
            ->join('tblProductCategory', 'tblProduct.intProductCategory', '=', 'tblProductCategory.intProductCategoryID')
            ->select('tblProduct.*', 'tblProductCategory.strProductCategoryName')
            ->get();
        foreach ($product as $b) {
                # code...
            $product=$b;
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
        $product = Product::find($id);
        return Response::json($product);
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
        $rules = Product::$update_rules;
        $rules['strProductName'] = str_replace('ignore:id', 'ignore:'.$id, $rules['strProductName']);
        $this->validate($request, $rules);
        $product = Product::find($id);
        $product->strProductName = $request->strProductName;
        $product->intProductCategory = $request->intProductCategory;
        $product->strProductSerialNumber = $request->strProductSerialNumber;
        $product->save();
        $product = DB::table('tblProduct')
        ->join('tblProductCategory', 'tblProduct.intProductCategory', '=', 'tblProductCategory.intProductCategoryID')
        ->select('tblProduct.*', 'tblProductCategory.strProductCategoryName')
        ->get();
        foreach ($product as $b) {
                # code...
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
        $product = Product::find($id);
        $product->isDeleted=1;
        $product->isActive=0;
        $product->save();
        return Response::json($product);
    }
}
