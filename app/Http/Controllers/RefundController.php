<?php

namespace App\Http\Controllers;

use App\ItemOrder;
use App\Payment;
use App\Stock;
use Illuminate\Http\Request;
use App\Invoice;
use DB;
use App\Refund;
use App\RefundItem;
use App\RefundStatus;
use Carbon\Carbon;
class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $refunds = Refund::all();
        return view('transactions.refund.index', compact('refunds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('transactions.refund.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
//        dd($request->all());
        try {
            // [todo] insert validation rules here

            \DB::beginTransaction();

            //refund
            $refund = new Refund();
            $refund->int_refund_invoice_id_fk = $request->invoice_no;
            $refund->str_received_by = $request->received_by;
            $refund->tms_date_refunded = Carbon::now();
            $refund->save();

            // refund item
            foreach($request->item_orders as $item_id)
            {
                $refund_item = new RefundItem();
                $refund_item->int_ref_item_refund_id_fk = $refund->int_refund_id;
                $refund_item->int_ref_item_item_order_id_fk = $item_id;
                $refund_item->int_return_quantity = $request->quantity[$item_id];
                $item_order = ItemOrder::where('int_item_order_id', $item_id)->first();
                $stock = Stock::create([
                    'int_stock_var_id_fk' => $item_order->int_io_var_id_fk,
                    'int_quantity' => $request->quantity[$item_id]
                ]);
                $refund_item->is_returned = 1;
                $refund_item->save();

            }

            // refund status
            $refund_status = new RefundStatus();
            $refund_status->int_rstat_refund_id_fk = $refund->int_refund_id;
            $refund_status->str_status = "Done";
            $refund_status->tms_as_of = Carbon::now();
            $refund_status->save();

            \DB::commit();
        }
        catch(Exception $e){
            \DB::rollback();

            return response()->json([
                'message'   => $e,
                'alert'     => 'error',
            ]);
        }

        return response()->json([
            'message'   => 'Successfully completed transaction',
            'alert'     => 'success',
            'url'       => route('refund.index')
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
            $refund = Refund::find($id);

//            dd($refund->int_refund_id);
            $alert = 'success';
        }
        catch(Exception $e){
            $alert = 'error';
        }
        return view('transactions.refund.show', compact(['refund', 'alert']));
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

    public function getPaymentData()
    {
//        $payments = Payment::with('invoice.order')->get();
        $payments = DB::table('tbl_payment as p')
            ->join('tbl_invoice as i', 'i.int_invoice_id', 'p.int_paym_invoice_id_fk')
            ->join('tbl_order as o', 'o.int_order_id', 'i.int_invoice_order_id_fk')
            ->join('tbl_item_order as io', 'io.int_io_order_id_fk', 'o.int_order_id')
            ->select(DB::raw('DISTINCT(p.int_paym_invoice_id_fk)'), 'o.str_purc_order_num')
            ->get();

        return json_encode(compact('payments'));
    }

    public function getInvoice($id)
    {
        try {
            $invoice = Invoice::where('int_invoice_id', $id)->with('order.item_orders.variant.prices')->first();
            $refund = Refund::where('int_refund_invoice_id_fk', $id)->with('items.item')->get();

//            dd($refund->int_refund_id);
//            dd($invoice->int_invoice_id);
            $alert = 'success';
        }
        catch(Exception $e){
            $alert = 'error';
        }
        return json_encode(compact('invoice', 'alert', 'refund'));
    }
}
