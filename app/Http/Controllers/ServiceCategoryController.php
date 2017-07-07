<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceCategory;
use Response;
use DB;

class ServiceCategoryController extends Controller
{
    public function checkbox($id)
    {
        $servicecategory = ServiceCategory::find($id);
        if($servicecategory->isActive) {
            $servicecategory->isActive=0;
        }
        else {
            $servicecategory->isActive=1;
        }
        $servicecategory->save();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicecategory = DB::table('tblServiceCategory')
        ->select('tblServiceCategory.*')
        ->where('isDeleted','=',0)
        ->get();
        return view('maintenance.servicecategory.index')->with('servicecategory', $servicecategory);
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
        $this->validate($request, ServiceCategory::$new_rules);
        $servicecategory = new ServiceCategory;
        $servicecategory->strServiceCategName = trim(ucfirst($request->strServiceCategName));
        $servicecategory->strDesc= trim(ucfirst($request->strDesc));
        $servicecategory->save();
        return Response::json($servicecategory);
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
        $servicecategory = ServiceCategory::find($id);
        return Response::json($servicecategory);
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
        $rules = ServiceCategory::$update_rules;
        $rules['strServiceCategName'] = str_replace('ignore:id', 'ignore:'.$id, $rules['strServiceCategName']);
        $this->validate($request, $rules);
        $servicecategory = ServiceCategory::find($id);
        $servicecategory->strServiceCategName = $request->strServiceCategName;
        $servicecategory->strDesc=$request->strDesc;
        $servicecategory->save();
        return Response::json($servicecategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicecategory = ServiceCategory::find($id);
        $servicecategory->isDeleted = 1;
        $servicecategory->isActive = 0;
        $servicecategory->save();
        return Response::json($servicecategory);
    }
}
