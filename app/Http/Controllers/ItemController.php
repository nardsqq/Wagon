<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('strProdName')->get();
        $brands = Brand::orderBy('strBrandName')->get();
        $items = Item::orderBy('strItemModel')->get();

        return view('maintenance.product-build.index')->with('products', $products)->with('brands', $brands)->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::orderBy('strProdName')->get();
        $brands = Brand::orderBy('strBrandName')->get();
        $items = Item::orderBy('strItemModel')->get();

        return view('maintenance.product-build.create')->with('products', $products)->with('brands', $brands)->with('items', $items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item;
        $item->intI_Prod_ID = $request->intI_Prod_ID;
        $item->intI_Brand_ID = $request->intI_Brand_ID;
        $item->strItemModel = trim(ucwords($request->strItemModel));
        $item->strItemHandle = trim(ucwords($request->strItemHandle));
        $item->intItemLevel = trim($request->intItemLevel);
        $item->txtItemDesc = trim(ucfirst($request->txtItemDesc));

        $item->save();

        return redirect()->route('product-build.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::findOrFail($id);
        
        return view('maintenance.product-build.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $products = Product::pluck('strProdName', 'intProdID');
        $brands = Brand::pluck('strBrandName', 'intBrandID');

        return view('maintenance.product-build.edit')->with('item', $item)->with('products', $products)->with('brands', $brands);
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
        $product = Product::find($request->intI_Prod_ID);
        $brand = Brand::find($request->intI_Brand_ID);
        $item = Item::findOrFail($id);

        $item->products()->associate($product);
        $item->brands()->associate($brand);
        $item->strItemModel = trim($request->strItemModel);
        $item->strItemHandle = trim($request->strItemHandle);
        $item->intItemLevel = trim($request->intItemLevel);
        $item->txtItemDesc = trim($request->txtItemDesc);

        $item->save();

        return redirect(route('product-build.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $del = [];
        $request->has('values') ? $del = $request->values : array_push($del, $id);
        $item = Item::destroy($del);

        return response()->json($item);
    }
}
