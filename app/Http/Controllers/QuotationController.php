<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotation;
use App\Client;
use App\Personnel;
use App\ProductType;
use App\Product;
use App\Brand;
// use App\Dimensions;
use App\ServiceType;
use App\ServiceArea;

class QuotationController extends Controller 
{
    public function table()
    {
        $quotations = Quotation::all();
        return view('transactions.quotation.table')->with('quotations', $quotations);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotations = Quotation::all();
        $clients = Client::all();
        $personnels = Personnel::all();
        $product_types = ProductType::with('products.variants.brands')->get();
        $products = Product::all();
        $brands = Brand::all();
        $dimensions = [];//Dimensions::all();
        // $service_types = ServiceType::all();
        $service_areas = ServiceArea::all();
        return view('transactions.quotation.index', compact(
            'quotations', 'clients', 'personnels', 
            'product_types', 'products', 'brands', 'dimensions',
            'service_areas'
        ));
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
            $this->validate($request, Quotation::$rules);

            $quotation = new Quotation;

            $quotation->intQH_Client_ID = trim($request->intQH_Client_ID);
            $quotation->strClientAssoc = trim($request->strClientAssoc);
            $quotation->strQuotHeadLocation = trim($request->strQuotHeadLocation);
        
      
            $quotation->save();
            return response()->json($quotation);

        } else {
            return redirect()->route('quotation.index');
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
        $quotation = Quotation::findOrFail($id);
        return view('transactions.quotation.show')->with('quotation', $quotation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quotation = Quotation::findOrFail($id);
        return response()->json($quotation);
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

            $quotation = Quotation::findOrFail($id);

            $quotation->intQH_Client_ID = trim($request->intQH_Client_ID);
            $quotation->strClientAssoc = trim($request->strClientAssoc);
            $quotation->strQuotHeadLocation = trim($request->strQuotHeadLocation);
        
      
            $quotation->save();
            return response()->json($quotation);

        } else {
            return redirect()->route('quotation.index');
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
        if($request->ajax()) {
            $del = [];
            $request->has('values') ? $del = $request->values : array_push($del, $id);
            $quotation = Quotation::destroy($del);

            return response()->json($quotation);
        } else {
            return redirect()->route('quotation.index');
        }
    }
}
