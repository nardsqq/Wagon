<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VehicleType;
use App\Vehicle;

class VehicleController extends Controller
{
    public function table()
    {
        $vehitypes = VehicleType::orderBy('strVehiTypeName')->get();
        $vehicles = Vehicle::orderBy('strVehiModel')->get();
        return view('maintenance.vehicle.table')->with('vehicles', $vehicles)->with('vehitypes', $vehitypes);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehitypes = VehicleType::orderBy('strVehiTypeName')->get();
        $vehicles = Vehicle::orderBy('strVehiModel')->get();
        return view('maintenance.vehicle.index')->with('vehicles', $vehicles)->with('vehitypes', $vehitypes);
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
            $this->validate($request, Vehicle::$rules);

            $vehitype = VehicleType::find($request->intV_VehiType_ID);
            $vehicle = new Vehicle;

            $vehicle->vehitypes()->associate($vehitype);
            $vehicle->strVehiModel = trim(ucwords($request->strVehiModel));
            $vehicle->strVehiPlateNumber = trim($request->strVehiPlateNumber);
            $vehicle->strVehiVIN = trim(strtoupper($request->strVehiVIN));
            $vehicle->intVehiNetCapacity = trim($request->intVehiNetCapacity);
            $vehicle->intVehiGrossWeight = trim($request->intVehiGrossWeight);

            $vehicle->save();
            return response()->json($vehicle);
        } else {
            return redirect(route('vehicle.index'));
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
        $vehicle = Vehicle::findOrFail($id);
        return view('maintenance.vehicle.show')->with('vehicle', $vehicle);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return response()->json($vehicle);
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

            $vehitype = VehicleType::find($request->intV_VehiType_ID);
            $vehicle = Vehicle::findOrFail($id);

            $vehicle->vehitypes()->associate($vehitype);
            $vehicle->strVehiModel = trim(ucwords($request->strVehiModel));
            $vehicle->strVehiPlateNumber = trim($request->strVehiPlateNumber);
            $vehicle->strVehiVIN = trim(strtoupper($request->strVehiVIN));
            $vehicle->intVehiNetCapacity = trim($request->intVehiNetCapacity);
            $vehicle->intVehiGrossWeight = trim($request->intVehiGrossWeight);

            $vehicle->save();
            return response()->json($vehicle);
        } else {
            return redirect(route('vehicle.index'));
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
            $vehicle = Vehicle::destroy($del);

            return response()->json($vehicle);
        } else {
            return redirect(route('vehicle.index'));
        }
    }
}
