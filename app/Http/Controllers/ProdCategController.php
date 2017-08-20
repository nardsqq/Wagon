<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ProductCategory;
use Validator;
use Response;
use View;
use DB;

class ProdCategController extends Controller
{

    /*Enforce Validation Rules*/
    protected $rules =
    [
        'strProdCategName' => 'required|min:2|unique:tblProductCategory|max:45|regex:/^[a-z ,.\'-]+$/i',
        'txtProdCategDesc' => 'min:2|max:500|regex:/^[a-z ,.\'-]+$/i'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodcategs = DB::table('tblProductCategory')
            ->select('tblProductCategory.*')
            ->where('isDeleted', '=', 0)
            ->orderBy('intProdCategID', 'strProdCategName')
            ->get();
        return view('maintenance.product-category.index')->with('prodcategs', $prodcategs);
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
            $prodcateg = new ProductCategory;
            $prodcateg ->strProdCategName = trim(ucwords($request->strProdCategName));
            $prodcateg ->txtProdCategDesc = trim(ucfirst($request->txtProdCategDesc));
            $prodcateg->save();
            return response()->json($prodcateg);
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
        $prodcateg = ProductCategory::findOrFail($id);
        return response()->json($prodcateg);
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
        $prodcateg = ProductCategory::findOrFail($id);
        $prodcateg ->strProdCategName = trim($request->strProdCategName);
        $prodcateg ->txtProdCategDesc = trim($request->txtProdCategDesc);
        $prodcateg->save();
        return response()->json($prodcateg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prodcateg = ProductCategory::findOrFail($id);
        $prodcateg->isDeleted = 1;
        $prodcateg->intProdCategStatus = 0;
        $prodcateg->save();
        return response()->json($prodcateg);
    }
}
