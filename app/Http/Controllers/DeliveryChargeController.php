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
        $delcharges = DeliveryCharge::all();
        return view('maintenance.delivery-charge.index')->with('delcharges', $delcharges);
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
            $delcharge = new DeliveryCharge();
            $delcharge->strDelCharName = trim(ucwords($request->strDelCharName));
            $delcharge->strDelCharWeight = trim(ucwords($request->strDelCharWeight));
            $delcharge->strDelCharRate = trim(ucwords($request->strDelCharRate));
            $delcharge->save();
            return response()->json($delcharge);
        } else {
            return redirect(route('delivery-charge.index'));
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
        $delcharge = DeliveryCharge::findOrFail($id);
        return response()->json($delcharge);
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
            $delcharge = DeliveryCharge::findOrFail($id);
            $delcharge->strDelCharName = trim($request->strDelCharName);
            $delcharge->strDelCharWeight = trim($request->strDelCharWeight);
            $delcharge->strDelCharRate = trim($request->strDelCharRate);
            $delcharge->save();
            return response()->json($delcharge);
        } else {
            return redirect(route('delivery-charge.index'));
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
        //
    }
}
