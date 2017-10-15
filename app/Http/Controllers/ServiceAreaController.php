<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceArea;
use App\ServiceType;
use App\ServiceChecklist;
use App\ServiceStep;

class ServiceAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servtypes = ServiceType::orderBy('strServTypeName')->get();
        $servareas = ServiceArea::orderBy('strServAreaName')->get();
        
        return view('maintenance.service-area.index')->with('servareas', $servareas)->with('servtypes', $servtypes);
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
            $servtype = ServiceType::find($request->intSA_ServType_ID);
            $servarea = new ServiceArea;
            $servarea->servtypes()->associate($servtype);
            $servarea->strServAreaName = trim(ucwords($request->strServAreaName));
            $servarea->txtServAreaDesc = trim(ucwords($request->txtServAreaDesc));
            $servarea->save();
            
            foreach($request->strServStepDesc as $step){
                ServiceChecklist::create([
                    'intSCL_ServArea_ID' => $servarea->intServAreaID,
                    'intSCL_ServStep_ID' => ServiceStep::create([
                        'strServStepDesc' => trim($step) 
                    ])->intServStepID,
                ]);
            }

            return response()->json($servarea);
        } else {
            return redirect(route('service-area.index'));
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
        $servarea = ServiceArea::with('steps')->findOrFail($id);
        return response()->json($servarea);
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
            $servtype = ServiceType::find($request->intSA_ServType_ID);
            $servarea = ServiceArea::findOrFail($id);
            $servarea->servtypes()->associate($servtype);
            $servarea->strServAreaName = trim($request->strServAreaName);
            $servarea->txtServAreaDesc = trim($request->txtServAreaDesc);
            $servarea->save();
            return response()->json($servarea);
        } else {
            return redirect(route('service-area.index'));
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
        $del = [];
        $request->has('values') ? $del = $request->values : array_push($del, $id);
        $servarea = ServiceArea::destroy($del);

        return response()->json($servarea);
    }
}
