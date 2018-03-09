<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\ServiceOrder;
use App\ServiceOrderStatus;
use App\ServiceOrderPersonnel;
use App\ServiceOrderSchedule;
use App\Personnel;


class DeploymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transactions.deployment.index');        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::with('service_orders.service')->has('service_orders')->doesntHave('service_orders.service_schedules')->pluck('str_purc_order_num', 'int_order_id')->toArray();
        return view('transactions.deployment.create', compact('orders'));
    }

    public function formData(){

        $orders = Order::with('service_orders.service')->has('service_orders')->doesntHave('service_orders.service_schedules')->get();
        $personnels = Personnel::all();
        return json_encode(compact('orders', 'personnels'));
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

            $order = Order::findOrFail($request->order_no);
            foreach($request->service_orders as $service_order_id){
                // $service_order = ServiceOrder::findOrFail($service_order_id);
                $sched = ServiceOrderSchedule::create([
                    'int_ss_service_order_id_fk' => $service_order_id,
                    'dat_start' => $request->dat_start[$service_order_id],
                    'dat_end' => $request->dat_end[$service_order_id]
                ]);

                ServiceOrderStatus::create([
                    'int_sos_service_order_id_fk' => $service_order_id,
                    'str_status' => ServiceOrderStatus::$status['SCH']
                ]);

                foreach($request->personnels[$service_order_id] as $personnel_id){
                    ServiceOrderPersonnel::create([
                        'int_schedule_id_fk' => $sched->int_sched_id,
                        'int_personnel_id_fk' => $personnel_id
                    ]);
                }
            }

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
            'url'       => route('process-deployment.index')
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
