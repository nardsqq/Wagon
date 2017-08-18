<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Brand;
use Validator;
use Response;
use View;

class BrandController extends Controller
{
    /*Enforce Validation Rules*/
    protected $rules =
    [
        'strBrandName' => 'required|min:2|unique:tblBrand|max:45|regex:/^[a-z ,.\'-]+$/i',
        'txtBrandDesc' => 'min:2|max:500|regex:/^[a-z ,.\'-]+$/i'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('intBrandID', 'strBrandName')->get();
        return view('maintenance.brand.index')->with('brands', $brands);
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
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            
            $brand = new Brand;
            $brand ->strBrandName = trim(ucfirst($request->strBrandName));
            $brand ->txtBrandDesc = trim(ucfirst($request->txtBrandDesc));
            $brand->save();
            return response()->json($brand);
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
        $brand = Brand::findOrFail($id);
        return response()->json($brand);
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
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $brand = Brand::findOrFail($id);
            $brand ->strBrandName = trim($request->strBrandName);
            $brand ->txtBrandDesc = trim($request->txtBrandDesc);
            $brand->save();
            return response()->json($brand);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
