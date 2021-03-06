<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PriceValidity;

class PriceValidityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricevals = PriceValidity::orderBy('strPriceVName')->get();
        return view('maintenance.price-validity.index')->with('pricevals', $pricevals);
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
            $this->validate($request, PriceValidity::$rules);
            $priceval = new PriceValidity;
            $priceval ->strPriceVName = trim(ucwords($request->strPriceVName));
            $priceval ->strPriceVDuration = trim(ucfirst($request->strPriceVDuration));
            $priceval->save();
            
            return response()->json($priceval);
        } else {
            return redirect(route('price-validity.index'));
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
        $priceval = PriceValidity::findOrFail($id);
        return response()->json($priceval);
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
            $priceval = PriceValidity::findOrFail($id);
            $priceval ->strPriceVName = trim($request->strPriceVName);
            $priceval ->strPriceVDuration = trim($request->strPriceVDuration);
            $priceval->save();
            
            return response()->json($priceval);
        } else {
            return redirect(route('price-validity.index'));
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
            $priceval = PriceValidity::destroy($del);

            return response()->json($priceval);
        } else {
            return redirect(route('price-validity.index'));
        }
        
    }
}
