<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Skill;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('strRoleName')->get();
        $skills = Skill::orderBy('strSkillName')->get();

        return view('maintenance.role.index')->with('roles', $roles)->with('skills', $skills);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('strRoleName')->get();
        $skills = Skill::orderBy('strSkillName')->get();

        return view('maintenance.role.create')->with('roles', $roles)->with('skills', $skills);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Role::$rules);
        $role = new Role;

        $role->strRoleName = trim(ucwords($request->strRoleName));
        $role->txtRoleDesc = trim(ucfirst($request->txtRoleDesc));

        $role->save();
        $role->skills()->sync($request->intSkillSetID, false);

        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        
        return view('maintenance.role.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $skills = Skill::pluck('strSkillName', 'intSkillID');

        return view('maintenance.role.edit')->with('role', $role)->with('skills', $skills);
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
        $role = Role::findOrFail($id);

        $role->strRoleName = trim($request->strRoleName);
        $role->txtRoleDesc = trim($request->txtRoleDesc);

        $role->save();
        $role->skills()->sync($request->intSkillSetID);

        return redirect(route('role.index'));
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
            $role = Role::destroy($del);

            return response()->json($role);
        } else {
            return redirect(route('role.index'));
        }
    }
}
