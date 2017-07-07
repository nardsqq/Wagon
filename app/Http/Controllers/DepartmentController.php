<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use Response;
use DB;

class DepartmentController extends Controller
{
    public function checkbox($id)
    {
        $department = Department::find($id);
        if($department->isActive) {
            $department->isActive=0;
        }
        else {
            $department->isActive=1;
        }
        $department->save();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = DB::table('tblDepartment')
        ->select('tblDepartment.*')
        ->where('isDeleted','=',0)
        ->get();
        return view('maintenance.department.index')->with('department', $department);
    }

    public function table(Request $request) 
    {
        if($request->ajax()){
            $department = Department::all();
            return view('maintenance.department.table')->with('department', $department);
        }
        else {
            return redirect(route('dashboard'));
        }
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
        $this->validate($request, Department::$new_rules);
        $department = new Department;
        $department->strDepartmentName = trim(ucwords($request->strDepartmentName));
        $department->strDesc=trim(ucwords($request->strDesc));
        $department->save();
        return Response::json($department);
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
        $department = Department::find($id);
        return Response::json($department);
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
        $rules = Department::$update_rules;
        $rules['strDepartmentName'] = str_replace('ignore:id', 'ignore:'.$id, $rules['strDepartmentName']);
        $this->validate($request, $rules);
        $department = Department::find($id);
        $department->strDepartmentName = $request->strDepartmentName;
        $department->strDesc = $request->strDesc;
        $department->save();
        return Response::json($department);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->isDeleted = 1;
        $department->isActive = 0;
        $department->save();
        return Response::json($department);
    }
}
