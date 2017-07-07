<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use Response;
use DB;

class ProductCategoryController extends Controller
{
    public function checkbox($id)
    {
        $productcategory = ProductCategory::find($id);
        if($productcategory->isActive) {
            $productcategory->isActive=0;
        }
        else {
            $productcategory->isActive=1;
        }
        $productcategory->save();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productcategory = DB::table('tblProductCategory')
        ->select('tblProductCategory.*')
        ->where('isDeleted','=',0)
        ->get();
        return view('maintenance.productcategory.index')->with('productcategory', $productcategory);
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
        $this->validate($request, ProductCategory::$new_rules);
        $productcategory = new ProductCategory;
        $productcategory->strProductCategoryName = trim(ucfirst($request->strProductCategoryName));
        $productcategory->strDesc=trim(ucfirst($request->strDesc));
        $productcategory->save();
        return Response::json($productcategory);
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
        $productcategory = ProductCategory::find($id);
        return Response::json($productcategory);
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
        $rules = ProductCategory::$update_rules;
        $rules['strProductCategoryName'] = str_replace('ignore:id', 'ignore:'.$id, $rules['strProductCategoryName']);
        $this->validate($request, $rules);
        $productcategory = ProductCategory::find($id);
        $productcategory->strProductCategoryName = $request->strProductCategoryName;
        $productcategory->strDesc=$request->strDesc;
        $productcategory->save();
        return Response::json($productcategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productcategory = ProductCategory::find($id);
        $productcategory->isDeleted = 1;
        $productcategory->isActive = 0;
        $productcategory->save();
        return Response::json($productcategory);
    }
}
