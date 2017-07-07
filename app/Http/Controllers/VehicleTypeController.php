<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VehicleType;
use Response;
use DB;


class VehicleTypeController extends Controller
{
    public function checkbox($id)
    {
        $vehicletype = VehicleType::find($id);
        if($vehicletype->isActive) {
            $vehicletype->isActive=0;
        }
        else {
            $vehicletype->isActive=1;
        }
        $vehicletype->save();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicletype = DB::table('tblVehicleType')
        ->select('tblVehicleType.*')
        ->where('isDeleted','=',0)
        ->get();
        return view('maintenance.vehicletype.index')->with('vehicletype', $vehicletype);
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
        $this->validate($request, VehicleType::$new_rules);
        $vehicletype = new VehicleType;
        $vehicletype->strVehicleTypeName = trim(ucfirst($request->strVehicleTypeName));
        $vehicletype->strDesc= trim(ucfirst($request->strDesc));
        $vehicletype->save();
        return Response::json($vehicletype);
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
        $vehicletype = VehicleType::find($id);
        return Response::json($vehicletype);
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
        $rules = VehicleType::$update_rules;
        $rules['strVehicleTypeName'] = str_replace('ignore:id', 'ignore:'.$id, $rules['strVehicleTypeName']);
        $this->validate($request, $rules);
        $vehicletype = VehicleType::find($id);
        $vehicletype->strVehicleTypeName = $request->strVehicleTypeName;
        $vehicletype->strDesc=$request->strDesc;
        $vehicletype->save();
        return Response::json($vehicletype);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicletype = VehicleType::find($id);
        $vehicletype->isDeleted = 1;
        $vehicletype->isActive = 0;
        $vehicletype->save();
        return Response::json($vehicletype);
    }
}
