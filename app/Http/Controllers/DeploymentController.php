<?php

namespace App\Http\Controllers;

use App\Personnel;
use App\ServiceOrder;
use App\Order;
use App\ServiceOrderPersonnel;
use App\ServiceOrderSchedule;
use Illuminate\Http\Request;

class DeploymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $schedules = ServiceOrderSchedule::all();
        $service_orders = ServiceOrder::all();
        $personnel = Personnel::all();
        $service_personnel = ServiceOrderPersonnel::all();
        return view('transactions.deployment.index', compact( 'service_orders', 'schedules', 'personnel'));
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
//        dd($personnel);
//        dd($personnel);
        return response()->json([
            'alert'     => 'success',
            'personnel' => $personnel
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
        $orders = Order::all();
        $service_orders = ServiceOrder::all();
        return json_encode(compact('payments', 'orders', 'service_orders'));
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
}
