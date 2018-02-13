<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Variant;
use App\Product;
use App\Brand;
use App\Dimension;
use App\DimensionSet;
use App\UOM;

class VariantController extends Controller
{
    public function table()
    {
        $brands = Brand::orderBy('str_brand_name')->get();
        $products = Product::orderBy('strProdName')->get();
        $variants = Variant::orderBy('strVarModel')->get();

        return view('maintenance.product-variant.table')->with('brands', $brands)->with('products', $products)->with('variants', $variants);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('str_brand_name')->get();
        $products = Product::orderBy('strProdName')->get();
        $variants = Variant::orderBy('strVarModel')->get();

        return view('maintenance.product-variant.index')->with('brands', $brands)->with('products', $products)->with('variants', $variants);
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

            $brand = Brand::find($request->intV_Brand_ID);
            $product = Product::find($request->intV_Prod_ID);

            $variant = new Variant;

            $variant->brands()->associate($brand);
            $variant->products()->associate($product);
            $variant->strVarPartNum = trim(ucwords($request->strVarPartNum));
            $variant->strVarModel = trim(ucwords($request->strVarModel));
            $variant->intVarReStockLevel = trim($request->intVarReStockLevel);
            $variant->txtVarDesc = trim(ucfirst($request->txtVarDesc));
            $variant->decInventoryCost = $request->decInventoryCost;

            $variant->save();

            if ($request->strDimenValue != null) {
                foreach($request->strDimenValue as $attrib){
                    DimensionSet::create([
                        'intDS_Var_ID' => $variant->intVarID,
                        'intDS_Dim_ID' => Dimension::create([
                            'strDimenValue' => trim($attrib) 
                        ])->intDimenID,
                    ]);
                }
            } else {
                //throw exception here
            }
                

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
        $variant = Variant::findOrFail($id);
        return view('maintenance.product-variant.show')->with('variant', $variant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $variant = Variant::with('dimensions')->findOrFail($id);
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

            $brand = Brand::find($request->intV_Brand_ID);
            $product = Product::find($request->intV_Prod_ID);

            $variant = Variant::findOrFail($id);

            $variant->brands()->associate($brand);
            $variant->products()->associate($product);
            $variant->strVarPartNum = trim(ucwords($request->strVarPartNum));
            $variant->strVarModel = trim(ucwords($request->strVarModel));
            $variant->intVarReStockLevel = trim($request->intVarReStockLevel);
            $variant->txtVarDesc = trim(ucfirst($request->txtVarDesc));
            $variant->decInventoryCost = $request->decInventoryCost;

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
