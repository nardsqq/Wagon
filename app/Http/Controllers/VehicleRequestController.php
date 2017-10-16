<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VehicleRequest;
use App\Personnel;

class VehicleRequestController extends Controller
{
    public function table()
    {
        $personnels = Personnel::orderBy('intPersID')->get();
        $vehireqs = VehicleRequest::all();
        return view('transactions.vehicle-request.table')->with('vehireqs', $vehireqs)->with('personnels', $personnels);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnels = Personnel::orderBy('intPersID')->get();
        $vehireqs = VehicleRequest::all();
        return view('transactions.vehicle-request.index')->with('vehireqs', $vehireqs)->with('personnels', $personnels);
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

            $personnel = Personnel::find($request->intVR_Pers_ID);
            $vehireq = new VehicleRequest;

            $vehireq->pers()->associate($personnel);
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
            
            $personnel = Personnel::find($request->intVR_Pers_ID);
            $vehireq = VehicleRequest::findOrFail($id);

            $vehireq->pers()->associate($personnel);
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
