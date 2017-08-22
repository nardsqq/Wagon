<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Skill;
use Validator;
use Response;
use View;
use DB;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = DB::table('tblSkill')
            ->select('tblSkill.*')
            ->where('isDeleted', '=', 0)
            ->get();
        return view('maintenance.skill.index')->with('skills', $skills);
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
        $this->validate($request, Skill::$rules);
        $skill = new Skill;
        $skill ->strSkillName = trim(ucwords($request->strSkillName));
        $skill ->txtSkillDesc = trim(ucfirst($request->txtSkillDesc));
        $skill->save();
        return response()->json($skill);
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
        $skill = Skill::findOrFail($id);
        return response()->json($skill);
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
        $skill = Skill::findOrFail($id);
        $skill ->strSkillName = trim($request->strSkillName);
        $skill ->txtSkillDesc = trim($request->txtSkillDesc);
        $skill ->save();
        return response()->json($skill);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->isDeleted = 1;
        $skill->intSkillStatus = 0;
        $skill->save();
        return response()->json($skill);
    }
}