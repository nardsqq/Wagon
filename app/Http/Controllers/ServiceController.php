<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\ServiceCategory;
use Response;
use DB;

class ServiceController extends Controller
{
    public function checkbox($id)
    {
        $service = Service::find($id);
        if ($service->isActive) {
            $service->isActive=0;
        }
        else{
            $service->isActive=1;
        }
        $service->save();
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = DB::table('tblService')
            ->join('tblServiceCategory', 'tblService.intServiceCategory', '=', 'tblServiceCategory.intServiceCategID')
            ->select('tblService.*', 'tblServiceCategory.strServiceCategName')
            ->where('tblService.isDeleted','=',0)
            ->get();
        $servicecategory = DB::table('tblServiceCategory')
            ->select('tblServiceCategory.*')
            ->where('tblServiceCategory.isActive','=',1)
            ->get();
            return view('maintenance.service.index')->with('service', $service)->with('servicecategory', $servicecategory);
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
        $this->validate($request, Service::$new_rules);
        $service = new Service;
        $service->strServiceName = $request->strServiceName;
        $service->intServiceCategory = $request->intServiceCategory;
        $service->strDesc = $request->strDesc;
        $service->save();
        $service = DB::table('tblService')
            ->join('tblServiceCategory', 'tblService.intServiceCategory', '=', 'tblServiceCategory.intServiceCategID')
            ->select('tblService.*', 'tblServiceCategory.strServiceCategName')
            ->get();
        foreach ($service as $b) {
                # code...
            $service=$b;
        }
        return Response::json($service);
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
        $service = Service::find($id);
        return Response::json($service);
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
        $rules = Service::$update_rules;
        $rules['strServiceName'] = str_replace('ignore:id', 'ignore:'.$id, $rules['strServiceName']);
        $this->validate($request, $rules);
        $service = Service::find($id);
        $service->strServiceName = $request->strServiceName;
        $service->intServiceCategory = $request->intServiceCategory;
        $service->strDesc = $request->strDesc;
        $service->save();
        $service = DB::table('tblService')
            ->join('tblServiceCategory', 'tblService.intServiceCategory', '=', 'tblServiceCategory.intServiceCategID')
            ->select('tblService.*', 'tblServiceCategory.strServiceCategName')
            ->get();
        foreach ($service as $b) {
                # code...
            $service=$b;
        }
        return Response::json($service);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->isDeleted=1;
        $service->isActive=0;
        $service->save();
        return Response::json($service);
    }
}
