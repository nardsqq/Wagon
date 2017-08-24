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
        $attribs = Attribute::orderBy('strAttribName')->where('isDeleted', 0)->get();
        return view('maintenance.attribute.index')->with('attribs', $attribs)->with('attribtypes', $attribtypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attrib = new Attribute;
        $attrib->intAttribType = $request->intAttribType;
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
    public function destroy($id)
    {
        $attrib = Attribute::findOrFail($id);
        $attrib->isDeleted = 1;
        $attrib->intAttribStatus = 0;
        $attrib->save();
        return response()->json($attrib);
    }
}
