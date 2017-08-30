<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TermsOfPayment;

class TermsOfPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terms = TermsOfPayment::orderBy('intTOPNumOfDays')->get();
        return view('maintenance.terms-of-payment.index')->with('terms', $terms);
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
            $this->validate($request, TermsOfPayment::$rules);
            $term = new TermsOfPayment;
            $term ->intTOPNumOfDays = trim(ucwords($request->intTOPNumOfDays));
            $term->save();
            
            return response()->json($term);
        } else {
            return redirect(route('terms-of-payment.index'));
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
        $term = TermsOfPayment::findOrFail($id);
        return response()->json($term);
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
            $term = TermsOfPayment::findOrFail($id);
            $term ->intTOPNumOfDays = trim($request->intTOPNumOfDays);
            $term->save();
            
            return response()->json($term);
        } else {
            return redirect(route('terms-of-payment.index'));
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
            $term = TermsOfPayment::destroy($del);

            return response()->json($term);
        } else {
            return redirect(route('terms-of-payment.index'));
        }
        
    }
}
