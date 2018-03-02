<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Downpayment;

class DownpaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $downs = Downpayment::orderBy('str_down_name')->get();
        return view('maintenance.downpayment.index')->with('downs', $downs);
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
            $this->validate($request, Downpayment::$rules);
            $down = new Downpayment;
            $down->str_down_name = trim(ucwords($request->str_down_name));
            $down->dbl_down_percentage = trim($request->dbl_down_percentage);
            $down->save();
            
            return response()->json($down);
        } else {
            return redirect(route('downpayment.index'));
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
        $down = Downpayment::findOrFail($id);
        return response()->json($down);
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
            $down = Downpayment::findOrFail($id);
            $down ->str_down_name = trim($request->str_down_name);
            $down ->dbl_down_percentage = trim($request->dbl_down_percentage);
            $down->save();
            
            return response()->json($down);
        } else {
            return redirect(route('downpayment.index'));
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
            $down = Downpayment::destroy($del);

            return response()->json($down);
        } else {
            return redirect(route('downpayment.index'));
        }
        
    }
}
