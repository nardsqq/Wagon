<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UOM;

class UOMController extends Controller
{
    public function table()
    {
        $uoms = UOM::orderBy('strUOMUnit')->get();
        return view('maintenance.unit-of-measurement.table')->with('uoms', $uoms);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uoms = UOM::orderBy('strUOMUnit')->get();
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
        if($request->ajax()) {

            $uom = new UOM;

            $uom->strUOMUnit = trim(ucwords($request->strUOMUnit));
            $uom->strUOMUnitName = trim($request->strUOMUnitName);

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
        //
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
        //
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
