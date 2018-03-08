<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Delivery;
use App\Personnel;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveries = Delivery::all();
        $personnels = Personnel::all();
        return view('transactions.delivery.index', compact('deliveries', 'personnels'));
    }

    public function receipt(){
        return view('transactions.delivery.receipt');
    }

    public function table()
    {
        $deliveries = Delivery::all();
        return view('transactions.delivery.table', compact('deliveries'));
    }

    public function formData()
    {
        $orders = Order::whereHas('item_orders')->get();
       dd($orders);
        // $current_no = Order::latest()->first() ? Order::latest()->first()->str_order_no:null;
        // $order_num[0] = \Counter::generate($current_no, Order::$prefix, Order::$suffix[0]);
        // $order_num[1] = \Counter::generate($current_no, Order::$prefix, Order::$suffix[1]);

        // return json_encode(compact(
        //     'clients', 'products', 'services', 'terms', 'modes', 'downpayments', 'discounts', 'acqui_types', 'order_num'
        // ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transactions.delivery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // [todo] insert validation rules here

            \DB::beginTransaction();

            $delivery = Delivery::findOrFail($request->int_delivery_id);
            $delivery->int_del_personnel_id_fk = $request->int_personnel_id;
            $delivery->dat_delivery_date = $request->dat_delivery_date;
            $delivery->save();

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
            'alert'     => 'success'
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
