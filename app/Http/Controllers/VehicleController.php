<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\VehicleType;
use Response;
use DB;

class VehicleController extends Controller
{
    public function checkbox($id)
    {
        $vehicle = Vehicle::find($id);
        if ($vehicle->isActive) {
            $vehicle->isActive=0;
        }
        else{
            $vehicle->isActive=1;
        }
        $vehicle->save();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicle = DB::table('tblVehicle')
            ->join('tblVehicleType', 'tblVehicle.intVehicleTypeNum', '=', 'tblVehicleType.intVehicleTypeNumber')
            ->select('tblVehicle.*', 'tblVehicleType.strVehicleTypeName')
            ->where('tblVehicle.isDeleted','=',0)
            ->get();
        $vehicletype = DB::table('tblVehicleType')
            ->select('tblVehicleType.*')
            ->where('tblVehicleType.isActive','=',1)
            ->get();
            return view('maintenance.vehicle.index')->with('vehicle', $vehicle)->with('vehicletype', $vehicletype);
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
        $this->validate($request, Vehicle::$new_rules);
        $vehicle = new Vehicle;
        $vehicle->intVehicleTypeNum = $request->intVehicleTypeNum;
        $vehicle->strVehicleModel = trim(ucfirst($request->strVehicleModel));
        $vehicle->strVehiclePlateNumber = trim($request->strVehiclePlateNumber);
        $vehicle->intVehicleNetCapacity = $request->intVehicleNetCapacity;
        $vehicle->intVehicleGrossWeight = $request->intVehicleGrossWeight;
        $vehicle->save();
        $vehicle = DB::table('tblVehicle')
            ->join('tblVehicleType', 'tblVehicle.intVehicleTypeNum', '=', 'tblVehicleType.intVehicleTypeNumber')
            ->select('tblVehicle.*', 'tblVehicleType.strVehicleTypeName')
            ->get();
        foreach ($vehicle as $b) {
                # code...
            $vehicle=$b;
        }
        return Response::json($vehicle);
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
        $vehicle = Vehicle::find($id);
        return Response::json($vehicle);
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
        $vehicle = Vehicle::find($id);
        $vehicle->intVehicleTypeNum = $request->intVehicleTypeNum;
        $vehicle->strVehicleModel = $request->strVehicleModel;
        $vehicle->strVehiclePlateNumber = $request->strVehiclePlateNumber;
        $vehicle->intVehicleNetCapacity = $request->intVehicleNetCapacity;
        $vehicle->intVehicleGrossWeight = $request->intVehicleGrossWeight;
        $vehicle->save();
        $vehicle = DB::table('tblVehicle')
            ->join('tblVehicleType', 'tblVehicle.intVehicleTypeNum', '=', 'tblVehicleType.intVehicleTypeNumber')
            ->select('tblVehicle.*', 'tblVehicleType.strVehicleTypeName')
            ->get();
        foreach ($vehicle as $b) {
                # code...
            $vehicle=$b;
        }
        return Response::json($vehicle);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->isDeleted=1;
        $vehicle->isActive=0;
        $vehicle->save();
        return Response::json($vehicle);
    }
}
