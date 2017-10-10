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
        if($request->ajax()) {
            $this->validate($request, Variant::$rules);

            $supplier = Supplier::find($request->intV_Supp_ID);
            $brand = Brand::find($request->intV_Brand_ID);
            $product = Product::find($request->intV_Prod_ID);

            $variant = new Variant;

            $variant->supps()->associate($supplier);
            $variant->brands()->associate($brand);
            $variant->products()->associate($product);
            $variant->strVarModel = trim(ucwords($request->strVarModel));
            $variant->strVarHandle = trim(ucwords($request->strVarHandle));
            $variant->intVarReStockLevel = trim($request->intVarReStockLevel);
            $variant->txtVarDesc = trim(ucfirst($request->txtVarDesc));

            $variant->save();
            return response()->json($variant);
        } else {
            return redirect(route('product-variant.index'));
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
        $variant = Variant::findOrFail($id);
        return response()->json($variant);
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
        if($request->ajax()) {

            $supplier = Supplier::find($request->intV_Supp_ID);
            $brand = Brand::find($request->intV_Brand_ID);
            $product = Product::find($request->intV_Prod_ID);

            $variant = Variant::findOrFail($id);

            $variant->supps()->associate($supplier);
            $variant->brands()->associate($brand);
            $variant->products()->associate($product);
            $variant->strVarModel = trim(ucwords($request->strVarModel));
            $variant->strVarHandle = trim(ucwords($request->strVarHandle));
            $variant->intVarReStockLevel = trim($request->intVarReStockLevel);
            $variant->txtVarDesc = trim(ucfirst($request->txtVarDesc));

            $variant->save();
            return response()->json($variant);
        } else {
            return redirect(route('product-variant.index'));
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
            $variant = Variant::destroy($del);

            return response()->json($variant);
        } else {
            return redirect(route('product-variant.index'));
        }
    }
}
