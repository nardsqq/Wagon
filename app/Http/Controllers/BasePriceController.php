<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BasePrice;
use Validator;

class BasePriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = BasePrice::where('isDeleted', 0)->get();
        return view('maintenance.base-price.index')->with('prices', $prices);
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
        if ($request->ajax()) {
            $price = new BasePrice();
            $price->strBasePriceName = trim(ucwords($request->strBasePriceName));
            $price->txtBasePriceDesc = trim(ucfirst($request->txtBasePriceDesc));
            $price->save();
            return response()->json($price);
        } else {
            return redirect(route('base-price.index'));
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
        $price = BasePrice::findOrFail($id);
        return response()->json($price);
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
        if ($request->ajax()) {
            $price = BasePrice::findOrFail($id);
            $price->strBasePriceName = trim($request->strBasePriceName);
            $price->txtBasePriceDesc = trim($request->txtBasePriceDesc);
            $price->save();
            return response()->json($price);
        } else {
            return redirect(route('base-price.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = BasePrice::findOrFail($id);
        $price->isDeleted = 1;
        $price->intBasePriceStatus = 0;
        $price->save();
        return response()->json($price);
    }
}
