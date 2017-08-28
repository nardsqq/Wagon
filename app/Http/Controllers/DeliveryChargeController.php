<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeliveryCharge;

class DeliveryChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delchars = DeliveryCharge::orderBy('strDelCharName')->get();
        return view('maintenance.delivery-charge.index')->with('delchars', $delchars);
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
        $delchar = new DeliveryCharge;
        $delchar ->strDelCharName = trim(ucwords($request->strDelCharName));
        $delchar ->strDelCharWeight = trim(ucwords($request->strDelCharWeight));
        $delchar ->strDelCharRate = trim(ucwords($request->strDelCharRate));
        $delchar->save();
        
        return response()->json($delchar);
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
        $delchar = DeliveryCharge::findOrFail($id);
        return response()->json($delchar);
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
        $delchar = DeliveryCharge::findOrFail($id);
        $delchar ->strDelCharName = trim($request->strDelCharName);
        $delchar ->strDelCharWeight = trim($request->strDelCharWeight);
        $delchar ->strDelCharRate = trim($request->strDelCharRate);
        $delchar->save();
        
        return response()->json($delchar);
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
        $delchar = DeliveryCharge::destroy($del);

        return response()->json($delchar);
    }
}
