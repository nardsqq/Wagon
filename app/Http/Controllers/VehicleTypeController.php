<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VehicleType;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehitypes = VehicleType::orderBy('strVehiTypeName')->get();
        return view('maintenance.vehicle-type.index')->with('vehitypes', $vehitypes);
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
            $vehitype = new VehicleType();
            $vehitype->strVehiTypeName = trim(ucwords($request->strVehiTypeName));
            $vehitype->txtVehiTypeDesc = trim(ucfirst($request->txtVehiTypeDesc));
            $vehitype->save();
            return response()->json($vehitype);
        } else {
            return redirect(route('vehicle-type.index'));
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
        $vehitype = VehicleType::findOrFail($id);
        return response()->json($vehitype);
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
            $vehitype = VehicleType::findOrFail($id);
            $vehitype->strVehiTypeName = trim($request->strVehiTypeName);
            $vehitype->txtVehiTypeDesc = trim($request->txtVehiTypeDesc);
            $vehitype->save();
            return response()->json($vehitype);
        } else {
            return redirect(route('vehicle-type.index'));
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
