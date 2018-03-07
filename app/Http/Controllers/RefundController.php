<?php

namespace App\Http\Controllers;

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
}
