<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceType;
use Validator;

class ServiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servtypes = ServiceType::where('isDeleted', 0)->get();
        return view('maintenance.service-type.index')->with('servtypes', $servtypes);
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
            $servtype = new ServiceType();
            $servtype->strServTypeName = trim(ucwords($request->strServTypeName));
            $servtype->txtServTypeDesc = trim(ucfirst($request->txtServTypeDesc));
            $servtype->save();
            return response()->json($servtype);
        } else {
            return redirect(route('service-type.index'));
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
        $servtype = ServiceType::findOrFail($id);
        return response()->json($servtype);
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
            $servtype = ServiceType::findOrFail($id);
            $servtype->strServTypeName = trim($request->strServTypeName);
            $servtype->txtServTypeDesc = trim($request->txtServTypeDesc);
            $servtype->save();
            return response()->json($servtype);
        } else {
            return redirect(route('service-type.index'));
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
        $servtype = ServiceType::findOrFail($id);
        $servtype->isDeleted = 1;
        $servtype->intServTypeStatus = 0;
        $servtype->save();
        return response()->json($servtype);
    }
}
