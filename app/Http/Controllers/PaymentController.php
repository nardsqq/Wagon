<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\InvoiceStatus;
use App\Payment;
use App\Order;
use Carbon\Carbon;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::whereHas('invoice')->get();
        $due = false;
        return view('transactions.payment.index', compact('orders','due'));
    }

    public function due()
    {
        $due = true;
        $orders = Order::whereHas('invoice')->get()->filter(function ($order, $key) { 
            $term = $order->footer->term;
            $total = $order->invoice->dbl_total_amount;
            $payment = $total * ($term->int_terms_pay_percentage / 100);
            $order_date = $order->invoice->created_at->addDays($term->int_terms_pay_days);
            $due_date = $order_date->addDays($term->int_terms_pay_days * $order->invoice->payments->count());
            // [todo] determine the no of times the client missed the due date & set to $multiplier
            // [todo] $amount_due = $payment * $multiplier; if($amount_due > $balance) $amount_due = $balance;
            // [todo] determine the computed # of times the client will have to pay to complete his payment; then if ($paymentCount >= $paymentMultiple) check if $amount_due > $balance 

            var_dump($total, $payment, $due_date);

            return $due_date->lte(Carbon::now())
                && $order->invoice->current_status->str_status != InvoiceStatus::$status['PAID'];
        });
        
        return view('transactions.payment.index', compact('orders','due'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::pluck('str_purc_order_num', 'str_purc_order_num')->toArray();
        return view('transactions.payment.create', compact('orders'));
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

            $invoice = Order::where('str_purc_order_num', $request->invoice_no)->first()->invoice;
            
            if($invoice->dbl_total_amount > $invoice->payments()->sum('dbl_amount')){
                $payment = new Payment();
                $payment->int_paym_invoice_id_fk = $invoice->int_invoice_id;
                $payment->dat_date_received = $request->date_received;
                $payment->dbl_amount = $request->amount_received;
                $payment->str_received_by = 'test';
                $payment->save();
            } else {
                $alert = 'info';
                $message = 'Order is fully paid';
                return redirect(route('payment.index'), compact('alert', 'message'));
            }

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
            'url'       => route('payment.index')
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
            $order = Order::where('str_purc_order_num', $id)->first();
            $invoice = $order->invoice()->with('order')->first();
            $client = $order->client;

            $amount_due = $order->invoice->dbl_total_amount;
            $amount_paid = $order->invoice->payments()->sum('dbl_amount');
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

    public function payments($order_id)
    {
        $order = Order::findOrFail($order_id);
        return view('transactions.payment.payments', compact('order'));
    }

    public function receipt($id)
    {
        $types = ['(Client\'s Copy)', '(Seller\'s Copy)'];
        $payment = Payment::findOrFail($id);

        $order = $payment->invoice->order;
        $invoice = $order->invoice()->with('order')->first();
        $client = $order->client;

        $amount_due = $order->invoice->dbl_total_amount;
        $amount_paid = $order->invoice->payments()->sum('dbl_amount');
        $balance_due = $amount_due - $amount_paid;
        
        return view('transactions.payment.receipt', compact('payment', 'order', 'invoice', 'client', 'amount_due', 'amount_paid', 'balance_due', 'types'));
    }
}
