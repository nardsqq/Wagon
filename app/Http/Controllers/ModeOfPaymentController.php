<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModeOfPayment;

class ModeOfPaymentController extends Controller
{
    public function table()
    {
        $modes = ModeOfPayment::all();
        return view('maintenance.mode-of-payment.table')->with('modes', $modes);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modes = ModeOfPayment::all();
        return view('maintenance.mode-of-payment.index')->with('modes', $modes);
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
            $mode = new ModeOfPayment;
            $mode ->strMODName = trim(ucwords($request->strMODName));
            $mode->save();
            
            return response()->json($mode);
        } else {
            return redirect(route('mode-of-payment.index'));
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
        $mode = ModeOfPayment::findOrFail($id);
        return response()->json($mode);
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
        $mode = ModeOfPayment::findOrFail($id);
        $mode ->strMODName = trim($request->strMODName);
        $mode->save();
        
        return response()->json($mode);
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
            $mode = ModeOfPayment::destroy($del);

            return response()->json($mode);
        } else {
            return redirect(route('mode-of-payment.index'));
        }
    }
}
