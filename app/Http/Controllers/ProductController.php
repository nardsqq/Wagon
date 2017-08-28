<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use App\Attribute;
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
        $prodcategs = ProductCategory::orderBy('strProdCategName')->get();
        $attribs = Attribute::orderBy('strAttribName')->get();
        $products = Product::orderBy('strProdName')->get();

        return view('maintenance.product.index')->with('products', $products)->with('prodcategs', $prodcategs)->with('attribs', $attribs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodcategs = ProductCategory::orderBy('strProdCategName')->get();
        $attribs = Attribute::orderBy('strAttribName')->get();
        $products = Product::orderBy('strProdName')->get();

        return view('maintenance.product.create')->with('products', $products)->with('prodcategs', $prodcategs)->with('attribs', $attribs);
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
        $product = new Product;
        $product->intP_ProdCateg_ID = $request->intP_ProdCateg_ID;
        $product->strProdName = trim(ucwords($request->strProdName));
        $product->strProdHandle = trim(ucwords($request->strProdHandle));
        $product->strProdSKU = trim(strtoupper($request->strProdSKU));
        $product->txtProdDesc = trim(ucfirst($request->txtProdDesc));

        $product->save();
        $product->attribs()->sync($request->intFeatSetID, false);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        
        return view('maintenance.product.show')->with('product', $product);
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
        $prodcategs = ProductCategory::pluck('strProdCategName', 'intProdCategID');

        return view('maintenance.product.edit')->with('product', $product)->with('prodcategs', $prodcategs);
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
        $prodcateg = ProductCategory::find($request->intP_ProdCateg_ID);
        $product = Product::findOrFail($id);
        $product->prodcateg()->associate($prodcateg);
        $product->strProdName = trim($request->strProdName);
        $product->strProdHandle = trim($request->strProdHandle);
        $product->strProdSKU = trim($request->strProdSKU);
        $product->txtProdDesc = trim($request->txtProdDesc);

        $product->save();

        return redirect(route('product.index'));
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
        $product = Product::destroy($del);

        return response()->json($product);
    }
}
