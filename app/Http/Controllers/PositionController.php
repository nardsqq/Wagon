<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use Response;
use DB;

class PositionController extends Controller
{
    public function checkbox($id)
    {
        $position = Position::find($id);
        if($position->isActive) {
            $position->isActive=0;
        }
        else {
            $position->isActive=1;
        }
        $position->save();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $position = DB::table('tblPosition')
        ->select('tblPosition.*')
        ->where('isDeleted','=',0)
        ->get();
        return view('maintenance.position.index')->with('position', $position);
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
        $this->validate($request, Position::$new_rules);
        $position = new Position;
        $position->strPositionName = trim(ucfirst($request->strPositionName));
        $position->strDesc=trim(ucfirst($request->strDesc));
        $position->save();
        return Response::json($position);
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
        $position = Position::find($id);
        return Response::json($position);
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
        $rules = Position::$update_rules;
        $rules['strPositionName'] = str_replace('ignore:id', 'ignore:'.$id, $rules['strPositionName']);
        $this->validate($request, $rules);
        $position = Position::find($id);
        $position->strPositionName = $request->strPositionName;
        $position->strDesc=$request->strDesc;
        $position->save();
        return Response::json($position);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $position = Position::find($id);
        $position->isDeleted = 1;
        $position->isActive = 0;
        $position->save();
        return Response::json($position);
    }
}
