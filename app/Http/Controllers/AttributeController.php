<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Attribute;
use Validator;
use Response;
use View;

class AttributeController extends Controller
{
    /*Enforce Validation Rules*/
    protected $rules =
    [
        'strAttribName' => 'required|min:2|unique:tblAttribute|max:45|regex:/^[a-z ,.\'-]+$/i'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attribs = Attribute::orderBy('strAttribName')->where('isDeleted', 0)->get();
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
        $attrib = new Attribute;
        $attrib ->strAttribName = trim(ucfirst($request->strAttribName));
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
        $attrib = Attribute::findOrFail($id);
        return response()->json($attrib);
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
        $attrib = Attribute::findOrFail($id);
        $attrib ->strAttribName = trim($request->strAttribName);
        $attrib->save();
        return response()->json($attrib);
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
