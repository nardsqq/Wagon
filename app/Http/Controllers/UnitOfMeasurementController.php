<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UnitOfMeasurement;

class UnitOfMeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uoms = UnitOfMeasurement::all();
        return view('maintenance.unit-of-measurement.index')->with('uoms', $uoms);
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
            $this->validate($request, UnitOfMeasurement::$rules);

            $uom = new UnitOfMeasurement;

            $uom->strUOMUnit = trim($request->strUOMUnit);
            $uom->strUOMUnitName = trim($request->strUOMUnitName);
            $uom->intUOMCateg = trim($request->intUOMCateg);

            $uom->save();

            return response()->json($uom);
        } else {
            return redirect(route('unit-of-measurement.index'));
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
        $uom = UnitOfMeasurement::findOrFail($id);
        return response()->json($uom);
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
            $uom = UnitOfMeasurement::findOrFail($id);

            $uom->strUOMUnit = trim($request->strUOMUnit);
            $uom->strUOMUnitName = trim($request->strUOMUnitName);
            $uom->intUOMCateg = trim($request->intUOMCateg);

            $uom->save();

            return response()->json($uom);
        } else {
            return redirect(route('unit-of-measurement.index'));
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
            $uom = UnitOfMeasurement::destroy($del);

            return response()->json($uom);
        } else {
            return redirect(route('unit-of-measurement.index'));
        }
    }
}
