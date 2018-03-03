<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentTerm;

class PaymentTermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_terms = PaymentTerm::orderBy('str_terms_pay_name')->get();
        return view('maintenance.payment-term.index')->with('payment_terms', $payment_terms);
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
            // $this->validate($request, PaymentTerm::$rules);
            $payment_term = new PaymentTerm;
            $payment_term->str_terms_pay_name = trim(ucwords($request->str_terms_pay_name));
            $payment_term->int_terms_pay_percentage = trim($request->int_terms_pay_percentage);
            $payment_term->int_terms_pay_days = trim($request->int_terms_pay_days);
            $payment_term->save();
            
            return response()->json($payment_term);
        } else {
            return redirect(route('payment-term.index'));
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
        $payment_term = PaymentTerm::findOrFail($id);
        return response()->json($payment_term);
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
            $payment_term = PaymentTerm::findOrFail($id);
            $payment_term ->str_terms_pay_name = trim($request->str_terms_pay_name);
            $payment_term ->int_terms_pay_percentage = trim($request->int_terms_pay_percentage);
            $payment_term->int_terms_pay_days = trim($request->int_terms_pay_days);
            $payment_term->save();
            
            return response()->json($payment_term);
        } else {
            return redirect(route('payment-term.index'));
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
            $payment_term = PaymentTerm::destroy($del);

            return response()->json($payment_term);
        } else {
            return redirect(route('payment-term.index'));
        }
        
    }
}
