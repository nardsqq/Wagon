<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Payment;
use App\Order;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::whereHas('invoice.payments')->get();
        return view('transactions.payment.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transactions.payment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       try{
           \DB::beginTransaction();

            $invoice = Invoice::findOrFail($request->invoice_no);

            $payment = new Payment();
            $payment->int_paym_invoice_id_fk = $invoice->int_invoice_id;
            $payment->dat_date_received = $request->date_received;
            $payment->dbl_amount = $request->amount_received;
            $payment->str_received_by = 'test';
            $payment->save();

           \DB::commit();
       } catch(Exception $e){
            \DB::rollback();
            return response()->json([
                'message'   => $e,
                'alert'     => 'error',
            ]);
        }

        return response()->json([
            'message'   => 'Successfully completed transaction',
            'alert'     => 'success',
            //'invoice'   => action('ProcessOrderController@invoice', $order->int_order_id),
            'url'       => route('payment.create')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $invoice = Invoice::findOrFail($id);
            $client = $invoice->order->client;

            $amount_due = $invoice->dbl_total_amount;
            $amount_paid = $invoice->payments()->sum('dbl_amount');
            $balance_due = $amount_due - $amount_paid;

            $alert = 'success';
        }
        catch(Exception $e){
            $alert = 'error';
        }
        return compact('invoice', 'client', 'amount_due', 'amount_paid', 'balance_due', 'alert');
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
