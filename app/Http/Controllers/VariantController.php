<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Variant;
use App\Product;
use App\Supplier;
use App\Brand;

class VariantController extends Controller
{
    public function table()
    {
        $suppliers = Supplier::orderBy('strSuppName')->get();
        $brands = Brand::orderBy('strBrandName')->get();
        $products = Product::orderBy('strProdName')->get();
        $variants = Variant::orderBy('strVarModel')->get();

        return view('maintenance.product-variant.table')->with('suppliers', $suppliers)->with('brands', $brands)->with('products', $products)->with('variants', $variants);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::orderBy('strSuppName')->get();
        $brands = Brand::orderBy('strBrandName')->get();
        $products = Product::orderBy('strProdName')->get();
        $variants = Variant::orderBy('strVarModel')->get();

        return view('maintenance.product-variant.index')->with('suppliers', $suppliers)->with('brands', $brands)->with('products', $products)->with('variants', $variants);
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
        //
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
        //
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
