<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VehicleRequest;

class VehicleRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehireqs = VehicleRequest::all();
        return view('maintenance.vehicle-request.index')->with('vehireqs', $vehireqs);
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
            $this->validate($request, VehicleRequest::$rules);

            $vehireq = new VehicleRequest;

            $vehireq->strVehiReqLocation = trim(ucwords($request->strVehiReqLocation));
            $vehireq->datDeparture = trim($request->datDeparture);
            $vehireq->datEstReturn = trim($request->datEstReturn);
            $vehireq->txtVehiReqPurpose = trim(ucfirst($request->txtVehiReqPurpose));

            $vehireq->save();

            return response()->json($vehireq);
        } else {
            return redirect(route('vehicle-request.index'));
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
        $vehireq = VehicleRequest::findOrFail($id);
        return response()->json($vehireq);
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
            $vehireq = VehicleRequest::findOrFail($id);

            $vehireq->strVehiReqLocation = trim($request->strVehiReqLocation);
            $vehireq->datDeparture = trim($request->datDeparture);
            $vehireq->datEstReturn = trim($request->datEstReturn);
            $vehireq->txtVehiReqPurpose = trim($request->txtVehiReqPurpose);

            $vehireq->save();

            return response()->json($vehireq);
        } else {
            return redirect(route('vehicle-request.index'));
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
            $vehireq = VehicleRequest::destroy($del);

            return response()->json($vehireq);
        } else {
            return redirect(route('vehicle-request.index'));
        }
    }
}
