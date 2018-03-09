<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use App\Order;
use App\ServiceOrder;
use App\ServiceOrderStatus;
use App\ServiceOrderPersonnel;
use App\ServiceOrderSchedule;
use DB;
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
        $schedules = ServiceOrderSchedule::all();
        $service_orders = ServiceOrder::all();
        $personnel = Personnel::all();
        $service_personnel = ServiceOrderPersonnel::all();
        $orders = DB::table('tbl_order as o')
            ->join('tbl_service_order as so', 'so.int_so_order_id_fk', 'o.int_order_id')
            ->select(DB::raw('DISTINCT(o.int_order_id)'), 'o.str_purc_order_num')
            ->get();

        return view('transactions.deployment.index', compact( 'service_orders', 'schedules', 'personnel', 'orders'));
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
        /*
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
        */
        //
        
        try {
            // [todo] insert validation rules here

            \DB::beginTransaction();

            $service_sched = new ServiceOrderSchedule();
            $service_sched->int_ss_service_order_id_fk = $request->service_order_number;
            $service_sched->dat_start = $request->mobilization;
            $service_sched->dat_end = $request->de_mobilization;
            $service_sched->save();

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
        $personnel = ServiceOrderPersonnel::where('int_schedule_id_fk', $id)->with('personnel')->get();
        $service_schedule = ServiceOrderSchedule::where('int_sched_id', $id)->first();
        $service_order = ServiceOrder::where('int_service_order_id', $service_schedule->int_ss_service_order_id_fk)->first();
        $service = Service::where('int_service_id', $service_order->int_so_service_id_fk)->first();
        $order = Order::where('int_order_id', $service_order->int_so_order_id_fk)->first();
//        dd($personnel);
//        dd($personnel);
        return response()->json([
            'alert'     => 'success',
            'personnel' => $personnel,
            'order' => $order->str_purc_order_num,
            'service' => $service->str_service_name,
            'location' => $order->txt_deli_address,
            'service_schedule' => $service_schedule
        ]);
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

    public function getOrderData()
    {
        $orders = Order::with('service_orders')->get();
        $service_orders = ServiceOrderSchedule::all();
        return response()->json([
            'service_orders'   => $service_orders,
            'alert' => 'success',
        ]);
    }

    public function assignPersonnel(Request $request)
    {
//        dd($request->all());
        try {
            // [todo] insert validation rules here

            \DB::beginTransaction();

            foreach($request->personnel as $person_id)
            {
                $service_personnel = new ServiceOrderPersonnel();
                $service_personnel->int_schedule_id_fk = $request->service_schedule_id;
                $service_personnel->int_personnel_id_fk = $person_id;
                $service_personnel->txt_remarks = "";
                $service_personnel->save();
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

    public function getServiceOrders($id)
    {
        $service_orders = ServiceOrder::where('int_so_order_id_fk', $id)->with('service')->get();

        return response()->json([
            'service_orders'   => $service_orders,
            'alert'     => 'success',
        ]);
    }

    public function checkService($id)
    {
        $service_order = ServiceOrderSchedule::where('int_ss_service_order_id_fk', $id)->first();

        return response()->json([
            'service_order'   => $service_order,
            'alert'     => 'success',
        ]);
    }
}
