<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specs;

class SpecsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specs = Specs::orderBy('str_specs_name')->get();
        return view('maintenance.specs.index')->with('specs', $specs);
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
            $this->validate($request, Specs::$rules);
            $specs = new Specs;
            $specs ->str_specs_name = trim(ucfirst($request->str_specs_name));
            $specs ->str_specs_uom = trim(ucfirst($request->str_specs_uom));
            $specs->save();

            return response()->json($specs);
        } else {
            return redirect(route('specs.index'));
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
        $specs = Specs::findOrFail($id);
        return response()->json($specs);
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
            $specs = Specs::findOrFail($id);
            $specs ->str_specs_name = trim($request->str_specs_name);
            $specs ->str_specs_uom = trim(ucfirst($request->str_specs_uom));
            $specs->save();
            
            return response()->json($specs);
        } else {
            return redirect(route('specs.index'));
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
            $specs = Specs::destroy($del);

            return response()->json($specs);
        } else {
            return redirect(route('specs.index'));
        } 
    }
}
