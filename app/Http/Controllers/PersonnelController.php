<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personnel;
use App\Role;

class PersonnelController extends Controller
{
    public function table()
    {
        $personnels = Personnel::orderBy('intPersID')->get();
        $roles = Role::orderBy('strRoleName')->get();

        return view('maintenance.personnel.table')->with('personnels', $personnels)->with('roles', $roles);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnels = Personnel::orderBy('intPersID')->get();
        $roles = Role::orderBy('strRoleName')->get();

        return view('maintenance.personnel.index')->with('personnels', $personnels)->with('roles', $roles);
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
        if($request->ajax()) {
            $this->validate($request, Personnel::$rules);

            $role = Role::find($request->intPers_Role_ID);
            $personnel = new Personnel;

            $personnel->roles()->associate($role);
            $personnel->strPersEmpType = $request->strPersEmpType;
            $personnel->strPersFName = trim(ucwords($request->strPersFName));
            $personnel->strPersMName = trim(ucfirst($request->strPersMName));
            $personnel->strPersLName = trim(ucwords($request->strPersLName));
            $personnel->strPersMobNo = $request->strPersMobNo;

            $personnel->save();
            return response()->json($personnel);
        } else {
            return redirect(route('personnel.index'));
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
        $personnel = Personnel::findOrFail($id);
        return response()->json($personnel);
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
        if($request->ajax()) {

            $role = Role::find($request->intPers_Role_ID);
            $personnel = Personnel::findOrFail($id);

            $personnel->roles()->associate($role);
            $personnel->strPersEmpType = $request->strPersEmpType;
            $personnel->strPersFName = trim(ucwords($request->strPersFName));
            $personnel->strPersMName = trim(ucfirst($request->strPersMName));
            $personnel->strPersLName = trim(ucwords($request->strPersLName));
            $personnel->strPersMobNo = $request->strPersMobNo;

            $personnel->save();
            return response()->json($personnel);
        } else {
            return redirect(route('personnel.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $del = [];
            $request->has('values') ? $del = $request->values : array_push($del, $id);
            $personnel = Personnel::destroy($del);

            return response()->json($personnel);
        } else {
            return redirect(route('personnel.index'));
        }
    }
}
