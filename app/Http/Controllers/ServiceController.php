<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Service;
use App\ServiceDescription;
use App\Material;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('str_service_name')->get();

        return view('maintenance.service.index')->with('services', $services);
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
        try {
            \DB::beginTransaction();

            $service = Service::create([
                'str_service_name' => trim(ucwords($request->str_service_name)),
                'dbl_service_price' => $request->dbl_service_price
            ]);

            foreach($request->description as $desc){
                ServiceDescription::firstOrCreate([
                    'int_sd_service_id_fk' => $service->int_service_id,
                    'str_service_desc_detail' => $desc
                ]);
            }

            \DB::commit();
            return response()->json($service);
        } catch (Exception $e) {
            \DB::rollback();
            
            return response()-json([
                'code' => 500,
                'message' => 'Error',
                'data' => $e
            ]);
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
        $service = Service::with('descriptions')->where('int_service_id', $id)->first();

        return response()->json($service);
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
        try {
            \DB::beginTransaction();

            $service = Service::findOrfail($id);
            $service->str_service_name = trim(ucwords($request->str_service_name));
            $service->dbl_service_price = $request->dbl_service_price;
            $service->save();

            // delete removed descriptions
            $existing_desc = $service->descriptions->pluck('int_service_desc_id')->toArray();
            $current_desc = array_keys($request->description?:[]);
            $deleted_desc = array_diff($existing_desc, $current_desc);
            ServiceDescription::whereIn('int_service_desc_id', $deleted_desc)->delete();

            // add or update descriptions
            if($request->has('description')){
                foreach($request->description as $key => $desc){
                    ServiceDescription::updateOrCreate(
                        ['int_sd_service_id_fk' => $service->int_service_id, 'int_service_desc_id' => $key],
                        ['str_service_desc_detail' => $desc]
                    );
                }
            }

            \DB::commit();
            return response()->json($service);
        } catch (Exception $e) {
            \DB::rollback();
            
            return response()-json([
                'code' => 500,
                'message' => 'Error',
                'data' => $e
            ]);
        }
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
