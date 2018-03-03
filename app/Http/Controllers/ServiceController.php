<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Service;
use App\ServiceDescription;
use App\Material;
use App\Product;

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
        $products = Product::pluck('str_product_name', 'int_product_id');

        return view('maintenance.service.index', compact('services', 'products'));
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

            // descriptions
            if($request->has('description')){
                foreach($request->description as $desc){
                    ServiceDescription::firstOrCreate([
                        'int_sd_service_id_fk' => $service->int_service_id,
                        'str_service_desc_detail' => $desc
                    ]);
                }
            }

            // materials
            if($request->has('int_material_id')){
                foreach($request->int_material_id as $prod){
                    Material::firstOrCreate(
                        ['int_mat_service_id_fk' => $service->int_service_id, 'int_mat_prod_id_fk' => $prod]
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
        $products = $service->materials->pluck('int_mat_prod_id_fk')->toArray();
        
        return json_encode(compact('service', 'products'));
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

            // delete removed materials
            $existing_materials = $service->materials->pluck('int_mat_prod_id_fk')->toArray();
            $current_materials = array_keys($request->int_material_id?:[]);
            $deleted_materials = array_diff($existing_materials, $current_materials);
            // dd($existing_materials, $current_materials, $deleted_materials);
            Material::where('int_mat_service_id_fk', $service->int_service_id)->whereIn('int_mat_prod_id_fk', $deleted_materials)->delete();

            // add or update materials
            if($request->has('int_material_id')){
                foreach($request->int_material_id as $prod){
                    Material::firstOrCreate(
                        ['int_mat_service_id_fk' => $service->int_service_id, 'int_mat_prod_id_fk' => $prod]
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
