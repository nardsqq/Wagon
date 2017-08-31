<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personnel;
use App\Role;

class PersonnelController extends Controller
{
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
        $personnels = Personnel::orderBy('intPersID')->get();
        $roles = Role::orderBy('strRoleName')->get();

        return view('maintenance.personnel.create')->with('personnels', $personnels)->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Personnel::$rules);
        $personnel = new Personnel;
        $personnel->intPers_Role_ID = $request->intPers_Role_ID;
        $personnel->strPersFName = trim(ucwords($request->strPersFName));
        $personnel->strPersMName = trim($request->strPersMName);
        $personnel->strPersLName = trim(ucwords($request->strPersLName));

        $personnel->save();

        return redirect()->route('personnel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personnel = Personnel::findOrFail($id);
        
        return view('maintenance.personnel.show')->with('personnel', $personnel);
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
        $roles = Role::pluck('strRoleName', 'intRoleID');

        return view('maintenance.personnel.edit')->with('personnel', $personnel)->with('roles', $roles);
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
        $role = Role::find($request->intPers_Role_ID);
        $personnel = Personnel::findOrFail($id);
        $personnel->roles()->associate($role);
        $personnel->strPersFName = trim($request->strPersFName);
        $personnel->strPersMName = trim($request->strPersMName);
        $personnel->strPersLName = trim($request->strPersLName);
    
        $personnel->save();

        return redirect(route('personnel.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
