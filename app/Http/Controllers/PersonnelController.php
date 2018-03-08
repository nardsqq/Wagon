<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personnel;
use App\Position;

class PersonnelController extends Controller
{
    public function table()
    {
        $personnels = Personnel::orderBy('int_personnel_id')->get();
        $positions = Position::orderBy('str_position_name')->get();

        return view('maintenance.personnel.table')->with('personnels', $personnels)->with('positions', $positions);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnels = Personnel::orderBy('int_personnel_id')->get();
        $positions = Position::orderBy('str_position_name')->get();

        return view('maintenance.personnel.index')->with('personnels', $personnels)->with('positions', $positions);
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

            $position = Position::find($request->int_pers_position_id_fk);
            $personnel = new Personnel;

            $personnel->positions()->associate($position);
            $personnel->str_personnel_type = $request->str_personnel_type;
            $personnel->str_personnel_f_name = trim(ucwords($request->str_personnel_f_name));
            $personnel->str_personnel_m_name = trim(ucfirst($request->str_personnel_m_name));
            $personnel->str_personnel_l_name = trim(ucwords($request->str_personnel_l_name));
            $personnel->txt_personnel_address = trim(ucfirst($request->txt_personnel_address));
            $personnel->str_personnel_mobile_num = trim($request->str_personnel_mobile_num);

            $personnel->save();

            return response()->json([
                'code' => 200,
                'message' => 'Success',
                'data' => $personnel
            ]);

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
        $position = Position::all();
        //
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

            $position = Position::find($request->int_pers_position_id_fk);
            $personnel = Personnel::findOrFail($id);

            $personnel->positions()->associate($position);
            $personnel->str_personnel_f_name = trim(ucwords($request->str_personnel_f_name));
            $personnel->str_personnel_m_name = trim(ucfirst(($request->str_personnel_m_name)));
            $personnel->str_personnel_l_name = trim(ucfirst($request->str_personnel_l_name));
            $personnel->txt_personnel_address = trim(ucfirst($request->txt_personnel_address));
            $personnel->str_personnel_mobile_num = trim($request->str_personnel_mobile_num);

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
