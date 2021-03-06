<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::orderBy('created_at')->get();
        return view('maintenance.position.index')->with('positions', $positions);
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
        try {
            if ($request->ajax()) {
                $this->validate($request, Position::$rules);

                $position = new Position;

                $position->str_position_name = trim(ucwords($request->str_position_name));
                $position->txt_position_desc = trim(ucfirst($request->txt_position_desc));

                $position->save();
                
                return response()->json($position);
            } else {
                return redirect(route('position.index'));
            }
        } catch(Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => 'Error',
                'data' => $e
            ]);
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
        $position = Position::findOrFail($id);
        return response()->json($position);
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
        try {
            if ($request->ajax()) {
                $this->validate($request, Position::$rules);

                $position = Position::findOrFail($id);

                $position->str_position_name = trim(ucwords($request->str_position_name));
                $position->txt_position_desc = trim(ucfirst($request->txt_position_desc));

                $position->save();
                
                return response()->json($position);
            } else {
                return redirect(route('position.index'));
            }
        } catch(Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => 'Error',
                'data' => $e
            ]);
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
            $position = Position::destroy($del);

            return response()->json($position);
        } else {
            return redirect(route('position.index'));
        }
    }
}
