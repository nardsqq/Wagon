<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
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
        $prodtypes = ProductType::orderBy('strProdTypeName')->get();
        $products = Product::orderBy('strProdName')->get();

        return view('maintenance.product.index')->with('products', $products)->with('prodtypes', $prodtypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodtypes = ProductType::orderBy('strProdTypeName')->get();
        $products = Product::orderBy('strProdName')->get();

        return view('maintenance.product.create')->with('products', $products)->with('prodtypes', $prodtypes);
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
            $this->validate($request, Product::$rules);

            $prodtype = ProductType::find($request->intP_ProdType_ID);
            $product = new Product;

            $product->prodtypes()->associate($prodtype);
            $product->strProdCateg = trim(ucwords($request->strProdCateg));
            $product->strProdName = trim(ucwords($request->strProdName));
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
        if($request->ajax()) {
            $this->validate($request, Product::$rules);

            $prodtype = ProductType::find($request->intP_ProdType_ID);
            $product = Product::findOrFail($id);

            $product->prodtypes()->associate($prodtype);
            $product->strProdCateg = trim(ucwords($request->strProdCateg));
            $product->strProdName = trim(ucwords($request->strProdName));
            $product->txtProdDesc = trim(ucfirst($request->txtProdDesc));

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
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $del = [];
            $request->has('values') ? $del = $request->values : array_push($del, $id);
            $product = Product::destroy($del);

            return response()->json($product);
        } else {
            return redirect(route('product.index'));
        }
    }
}
