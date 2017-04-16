<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personnel;
use App\Department;
use App\Position;
use Response;
use DB;

class PersonnelController extends Controller
{

    public function checkbox($id)
    {
        $personnel = Personnel::find($id);
        if ($personnel->isActive) {
            $personnel->isActive=0;
        }
        else{
            $personnel->isActive=1;
        }
        $personnel->save();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnel = DB::table('tblPersonnel')
            ->join('tblDepartment', 'tblDepartment.intDepartmentID', 'tblPersonnel.intPersDeptID')
            ->join('tblPosition', 'tblPosition.intPositionID', 'tblPersonnel.intPersPosID')
            ->select('tblPersonnel.*', 'tblDepartment.strDepartmentName', 'tblPosition.strPositionName')
            ->where('tblPersonnel.isDeleted','=',0)
            ->get();
        $department = DB::table('tblDepartment')
            ->select('tblDepartment.*')
            ->where('tblDepartment.isActive','=',1)
            ->get();
        $position = DB::table('tblPosition')
            ->select('tblPosition.*')
            ->where('tblPosition.isActive','=',1)
            ->get();
        return view('maintenance.personnel.index')->with('personnel', $personnel)->with('department', $department)->with('position', $position);
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
        $this->validate($request, Personnel::$new_rules);
        $personnel = new Personnel;
        $personnel->strPersFName = $request->strPersFName;
        $personnel->strPersMName = $request->strPersMName;
        $personnel->strPersLName = $request->strPersLName;
        $personnel->intPersDeptID = $request->intPersDeptID;
        $personnel->intPersPosID = $request->intPersPosID;
        $personnel->strPersAddress = $request->strPersAddress;
        $personnel->strPersContactNumber = $request->strPersContactNumber;
        $personnel->save();
        $personnel = DB::table('tblPersonnel')
            ->join('tblDepartment', 'tblPersonnel.intPersDeptID', '=', 'tblDepartment.intDepartmentID')
            ->join('tblPosition', 'tblPersonnel.intPersPosID', '=', 'tblPosition.intPositionID')
            ->select('tblPersonnel.*', 'tblDepartment.strDepartmentName', 'tblPosition.strPositionName')
            ->get();
        foreach ($personnel as $b) {
                # code...
            $personnel=$b;
        }
        return Response::json($personnel);
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
        $personnel = Personnel::find($id);
        return Response::json($personnel);
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
        $rules = Personnel::$update_rules;
        $rules['strPersFName'] = str_replace('ignore:id', 'ignore:'.$id, $rules['strPersFName']);
        $this->validate($request, $rules);
        $personnel = Personnel::find($id);
        $personnel->strPersFName = $request->strPersFName;
        $personnel->strPersMName = $request->strPersMName;
        $personnel->strPersLName = $request->strPersLName;
        $personnel->intPersDeptID = $request->intPersDeptID;
        $personnel->intPersPosID = $request->intPersPosID;
        $personnel->strPersAddress = $request->strPersAddress;
        $personnel->strPersContactNumber = $request->strPersContactNumber;
        $personnel->save();
        $personnel = DB::table('tblPersonnel')
            ->join('tblDepartment', 'tblPersonnel.intPersDeptID', '=','tblDepartment.intDepartmentID')
            ->join('tblPosition', 'tblPersonnel.intPersPosID', '=', 'tblPosition.intPositionID')
            ->select('tblPersonnel.*', 'tblDepartment.strDepartmentName', 'tblPosition.strPositionName')
            ->get();
        foreach ($personnel as $b) {
                # code...
            $personnel = $b;
        }
        return Response::json($personnel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personnel = Personnel::find($id);
        $personnel->isDeleted=1;
        $personnel->isActive=0;
        $personnel->save();
        return Response::json($personnel);
    }
}
