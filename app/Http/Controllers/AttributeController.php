<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribute;

class AttributeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attribs = Attribute::orderBy('strAttribName')->get();
        return view('maintenance.attribute.index')->with('attribs', $attribs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Attribute::$rules);

        $attrib = new Attribute;

        $attrib->strAttribName = trim(ucfirst($request->strAttribName));
        $attrib->save();

        return redirect()->route('attributes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attrib = Attribute::findOrFail($id);
        return view('maintenance.attribute.show')->with('attrib', $attrib);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
            $attrib = Attribute::destroy($del);

            return response()->json($attrib);
        } else {
            return redirect(route('attributes.index'));
        }
    }
}
